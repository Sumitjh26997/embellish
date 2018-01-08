<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteItemLog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Delete Item Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-item-log-view">

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
            'item_id',
            'name',
            'description',
            'quantity',
            'qty_on_order',
            'qty_left',
            'rent_per_day',
            'height',
            'breadth',
            'length',
            'material',
            'type',
            'deleted_on',
            'deleted_by',
        ],
    ]) ?>

</div>
