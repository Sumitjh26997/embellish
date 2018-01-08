<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteOrdersrLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delete-orders-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'order_start_date') ?>

    <?= $form->field($model, 'order_end_date') ?>

    <?php // echo $form->field($model, 'order_timestap') ?>

    <?php // echo $form->field($model, 'sec_deposit') ?>

    <?php // echo $form->field($model, 'cart_amt') ?>

    <?php // echo $form->field($model, 'final_amt') ?>

    <?php // echo $form->field($model, 'return_date') ?>

    <?php // echo $form->field($model, 'fine') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'deleted_on') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
