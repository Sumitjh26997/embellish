<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteOrdersLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delete-orders-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'order_start_date')->textInput() ?>

    <?= $form->field($model, 'order_end_date')->textInput() ?>

    <?= $form->field($model, 'order_timestap')->textInput() ?>

    <?= $form->field($model, 'sec_deposit')->textInput() ?>

    <?= $form->field($model, 'cart_amt')->textInput() ?>

    <?= $form->field($model, 'final_amt')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'fine')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deleted_on')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
