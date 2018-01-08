<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteOrdersLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Delete Orders Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-orders-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'user_id',
            'order_start_date',
            'order_end_date',
            'order_timestap',
            'sec_deposit',
            'cart_amt',
            'final_amt',
            'return_date',
            'fine',
            'status',
            'deleted_on',
            'deleted_by',
        ],
    ]) ?>

</div>
