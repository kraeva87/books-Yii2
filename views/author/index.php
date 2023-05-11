<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors">
    <h1><?= Html::encode($this->title) ?></h1>

    <table>
        <tr>
            <th>Авторы</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($authors as $author): ?>
            <tr>
                <td><?= Html::encode("{$author->fio}") ?></td>
                <td><a href="/author/subscribe/<?=$author->id?>">Подписаться на новые книги</a>
                <?php if (!Yii::$app->user->isGuest) {
                    echo ' <a href="/author/edit/'.$author->id.'">Редактировать</a> <a href="/author/delete/'.$author->id.'">Удалить</a>';
                } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/author/add/">Добавить</a>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
