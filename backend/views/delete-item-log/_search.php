<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeleteItemLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delete-item-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'qty_on_order') ?>

    <?php // echo $form->field($model, 'qty_left') ?>

    <?php // echo $form->field($model, 'rent_per_day') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'breadth') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'material') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'deleted_on') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
