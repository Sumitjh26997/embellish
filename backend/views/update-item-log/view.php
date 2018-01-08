<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdateItemLog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Update Item Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-item-log-view">

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
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
