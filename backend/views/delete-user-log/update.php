<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteUserLog */

$this->title = 'Update Delete User Log: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Delete User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delete-user-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
