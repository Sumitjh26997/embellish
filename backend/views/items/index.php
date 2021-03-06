<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Upload Images', ['multiple'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_id',
            'name',
            'description',
            'quantity',
            'qty_on_order',
            //'qty_left',
            //'rent_per_day',
            //'color',
            //'height',
            //'breadth',
            //'length',
            //'material',
            //'type',
            //'image',
            //'featured',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
