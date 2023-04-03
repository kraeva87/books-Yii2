<?php

/** @var yii\web\Edit $this */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = $author->fio;
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
        'id' => 'new-author-form'
    ]) ?>
    <?= $form->field($author, 'fio')->textInput(['value' => $author->fio ? $author->fio : ''])->label('ФИО') ?>
    <br>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>
</div>
