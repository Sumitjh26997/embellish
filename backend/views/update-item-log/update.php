<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdateItemLog */

$this->title = 'Update Update Item Log: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Update Item Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- <div class="update-item-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
 -->