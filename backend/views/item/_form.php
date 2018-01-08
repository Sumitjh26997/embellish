<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'qty_on_order')->textInput() ?>

    <?= $form->field($model, 'qty_left')->textInput() ?>

    <?= $form->field($model, 'rent_per_day')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['placeholder' => 'Enter height in inches']) ?>

    <?= $form->field($model, 'breadth')->textInput(['placeholder' => 'Enter breadth in inches']) ?>

    <?= $form->field($model, 'length')->textInput(['placeholder' => 'Enter length in inches']) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'featured')->radioList(array('Yes' => 'Yes', 'No' => 'No')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
