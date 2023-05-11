<?php

/** @var yii\web\Edit $this */
/** @var yii\widgets\ActiveForm $form */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = $book->title;
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
        'id' => 'new-book-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($book, 'upload')->fileInput()->label('Фото главной страницы') ?>
    <?= $form->field($book, 'title')->textInput(['value' => $book->title ? $book->title : ''])->label('Название') ?>
    <?= $form->field($book, 'authors')->dropDownList(ArrayHelper::map($authors, 'id', 'fio'), [
        'prompt' => 'Выберите авторов...',
        'multiple' => 'true',
        'size' => 5,
        'options' => $book_authors
    ])->label('Авторы');
    ?>
    <?= $form->field($book, 'year')->textInput(['value' => $book->year ? $book->year : ''])->label('Год выпуска') ?>
    <?= $form->field($book, 'description')->textarea(['rows' => '6', 'value' => $book->description ? $book->description : ''])->label('Описание') ?>
    <?= $form->field($book, 'isbn')->textInput(['value' => $book->isbn ? $book->isbn : ''])->label('ISBN') ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>
