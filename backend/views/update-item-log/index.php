<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UpdateItemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Update Item Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-item-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'item_id',
            'name',
            'description',
            'quantity',
            //'qty_on_order',
            //'qty_left',
            //'rent_per_day',
            //'height',
            //'breadth',
            //'length',
            //'material',
            //'type',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
