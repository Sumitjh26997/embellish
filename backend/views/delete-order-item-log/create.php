<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeleteOrderItemLog */

$this->title = 'Create Delete Order Item Log';
$this->params['breadcrumbs'][] = ['label' => 'Delete Order Item Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-order-item-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
