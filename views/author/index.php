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
            <?php if (!Yii::$app->user->isGuest) { echo '<th>Действия</th>'; } ?>
        </tr>
        <?php foreach ($authors as $author): ?>
            <tr>
                <td><?= Html::encode("{$author->fio}") ?></td>
                <?php if (!Yii::$app->user->isGuest) {
                    echo '<td><a href="/web/author/edit/'.$author->id.'">edit</a> <a href="/web/author/delete/'.$author->id.'">delete</a></td>';
                } ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/web/author/add/">Добавить</a>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
