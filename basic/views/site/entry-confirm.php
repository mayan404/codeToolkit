<?php
/**
 * Created by PhpStorm.
 * User: litsoft
 * Date: 2017/7/26
 * Time: 16:21
 */
use yii\bootstrap\Html;
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>