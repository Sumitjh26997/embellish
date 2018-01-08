<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeleteOrdersrLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete Orders Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-orders-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'order_id',
            'user_id',
            'order_start_date',
            'order_end_date',
            //'order_timestap',
            'sec_deposit',
            'cart_amt',
            'final_amt',
            'return_date',
            //'fine',
            'status',
            'deleted_on',
            //'deleted_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
