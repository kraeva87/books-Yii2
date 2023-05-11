<?php

/** @var yii\web\Subscribe $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Подписка на " . $author->fio;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="subscribe">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('subscribeFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо за подписку.
        </div>

    <?php else: ?>

        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
            'id' => 'subscription-form'
        ]) ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ваше имя') ?>

        <?= $form->field($model, 'email')->label('Email') ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Подписаться', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end() ?>

    <?php endif; ?>
</div>