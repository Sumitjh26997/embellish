<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeleteItemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete Item Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-item-log-index">

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
            'qty_left',
            //'rent_per_day',
            //'height',
            //'breadth',
            //'length',
            //'material',
            //'type',
            'deleted_on',
            'deleted_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
