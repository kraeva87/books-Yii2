<?php

/** @var yii\web\Add $this */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Book $book */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = "Новая книга";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
        'id' => 'add-book-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($book, 'upload')->fileInput()->label('Фото главной страницы') ?>
    <?= $form->field($book, 'title')->textInput()->label('Название') ?>
    <?= $form->field($book, 'authors')->dropDownList(ArrayHelper::map($authors, 'id', 'fio'), [
        'prompt' => 'Выберите авторов...',
        'multiple' => 'true',
        'size' => 5
    ])->label('Авторы');
    ?>
    <?= $form->field($book, 'year')->textInput()->label('Год выпуска') ?>
    <?= $form->field($book, 'description')->textarea(['rows' => '6', 'value' => $book->description ? $book->description : ''])->label('Описание') ?>
    <?= $form->field($book, 'isbn')->textInput()->label('ISBN') ?>
    <br>
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
