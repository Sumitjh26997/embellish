<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeleteOrdersLog */

$this->title = 'Create Delete Orders Log';
$this->params['breadcrumbs'][] = ['label' => 'Delete Orders Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-orders-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
