<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books">
    <h1><?= Html::encode($this->title) ?></h1>

    <table>
        <tr>
            <th>Книга</th>
            <?php if (!Yii::$app->user->isGuest) { echo '<th>Действия</th>'; } ?>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><a href="/book/<?=$book->id?>"><?= Html::encode("{$book->title}") ?></a></td>
                <?php if (!Yii::$app->user->isGuest) {
                    echo '<td><a href="/book/edit/'.$book->id.'">Редактировать</a> <a href="/book/delete/'.$book->id.'">Удалить</a></td>';
                } ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/book/add/">Добавить</a>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
