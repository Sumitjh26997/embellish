<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeleteUserLog */

$this->title = 'Create Delete User Log';
$this->params['breadcrumbs'][] = ['label' => 'Delete User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-user-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
