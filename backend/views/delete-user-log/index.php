<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeleteUserLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete User Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-user-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'username',
            'email_id:email',
            'address',
            'phone',
            'company',
            'deleted_on',
            'feedback',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
