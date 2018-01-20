<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'qty_per_item')->textInput() ?>

    <?= $form->field($model, 'current_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
