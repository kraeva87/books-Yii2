<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
//use yii\web\Response;
use yii\data\Pagination;
use app\models\Author;

class AuthorController extends Controller
{
    public function actionIndex()
    {
        $query = Author::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $authors = $query->orderBy('fio')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'authors' => $authors,
            'pagination' => $pagination,
        ]);
    }

    public function actionAdd()
    {
        $author = new Author();
        $this->handleAuthorSave($author);

        return $this->render('add', [
            'author' => $author,
        ]);
    }

    public function actionEdit($id)
    {
        $author = Author::findOne($id);
        $this->handleAuthorSave($author);

        return $this->render('edit', [
            'author' => $author,
        ]);
    }

    protected function handleAuthorSave(Author $model)
    {
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }
            } else {
                // данные не корректны: $errors - массив содержащий сообщения об ошибках
                $errors = $model->errors;
            }
        }
    }

    public function actionDelete($id)
    {
        $author = Author::findOne($id);
        $author->delete();
        return $this->redirect(['index']);
    }
}