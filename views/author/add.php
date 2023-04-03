<?php

/** @var yii\web\Add $this */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Author $authors */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = "Новый автор";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
        'id' => 'add-author-form'
    ]); ?>
    <?= $form->field($author, 'fio')->textInput()->label('ФИО') ?>

    <br>
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
