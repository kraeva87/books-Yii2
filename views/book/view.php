<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $book->title;
?>
<div class="books">
    <h1><?= Html::encode($book->title) ?></h1>

    <table>
        <tr><td>Фото</td><td><img src="/uploads/<?= $book->photo ?>" style="max-width: 100px; max-height: 150px;"></td></tr>
        <tr><td>Название</td><td><?= Html::encode("{$book->title}") ?></td></tr>
        <tr><td>Автор</td><td><?= Html::encode("{$authors}") ?></td></tr>
        <tr><td>Год выпуска</td><td><?= Html::encode("{$book->year}") ?></td></tr>
        <tr><td>Описание</td><td><?= Html::encode("{$book->description}") ?></td></tr>
        <tr><td>ISBN</td><td><?= Html::encode("{$book->isbn}") ?></td></tr>
    </table>

</div>
