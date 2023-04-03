<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
//use yii\web\Response;
use yii\data\Pagination;
use app\models\Book;
use app\models\Author;
use app\models\Author_book;
use yii\web\UploadedFile;

class BookController extends Controller
{
    public function actionIndex()
    {
        $query = Book::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $books = $query->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'books' => $books,
            'pagination' => $pagination,
        ]);
    }

    public function actionView($id)
    {
        $book = Book::findOne($id);
        $authors_list = '';
        $authors = array();
        $authors_books = Author_book::find()->where(['id_book' => $id])->all();
        foreach ($authors_books as $author_book) {
            $author = Author::findOne($author_book->id_author);
            $authors[] = $author->fio;
        }
        $authors_list = implode(', ', $authors);

        return $this->render('view', [
            'book' => $book,
            'authors' => $authors_list,
        ]);
    }

    public function actionAdd()
    {
        $book = new Book();
        $this->handleBookSave($book);

        $query = Author::find();
        $authors = $query->orderBy('fio')->asArray()->all();

        return $this->render('add', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    public function actionEdit($id)
    {
        $book = Book::findOne($id);
        $book_authors = array();
        if (isset($_POST['authors'])) $book->authors = $_POST['authors'];

        $this->handleBookSave($book);

        $query = Author::find();
        $authors = $query->orderBy('fio')->asArray()->all();

        $authors_books = Author_book::find()->where(['id_book' => $id])->all();
        foreach ($authors_books as $author_book) {
            $book_authors[$author_book->id_author]['selected'] = true;
        }

        return $this->render('edit', [
            'book' => $book,
            'authors' => $authors,
            'book_authors' => $book_authors,
        ]);
    }

    protected function handleBookSave(Book $model)
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'upload');

            if ($model->validate()) {
                if ($model->upload) {
                    $filePath = '../uploads/' . $model->upload->baseName . '.' . $model->upload->extension;
                    if ($model->upload->saveAs($filePath)) {
                        $model->photo = $filePath;
                    }
                }
                $model->authors = $_POST["Book"]["authors"];
                Author_book::deleteAll(['id_book' => $model->id]);

                if ($model->save(false)) {
                    if ($model->authors) {
                        foreach ($model->authors as $author) {
                            $book_authors = new Author_book();
                            $book_authors->id_author = $author;
                            $book_authors->id_book = $model->id;
                            $book_authors->save();
                        }
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                // данные не корректны: $errors - массив содержащий сообщения об ошибках
                $errors = $model->errors;
            }
        }
    }

    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        Author_book::deleteAll(['id_book' => $id]);
        $book->delete();
        return $this->redirect(['index']);
    }

    //просмотр, добавление, редактирование, удаление
}
