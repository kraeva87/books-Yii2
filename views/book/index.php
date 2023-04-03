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
                <td><a href="/web/book/<?=$book->id?>"><?= Html::encode("{$book->title}") ?></a></td>
                <?php if (!Yii::$app->user->isGuest) {
                    echo '<td><a href="/web/book/edit/'.$book->id.'">edit</a> <a href="/web/book/delete/'.$book->id.'">delete</a></td>';
                } ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/web/book/add/">Добавить</a>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
