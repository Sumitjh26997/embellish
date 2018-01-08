<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Multiple Image Upload';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="item-form">

	<h1><?= 'Multiple Image Upload' ?></h1><br><br>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($upload, 'item_id')->dropDownList($item) ?>

    <?= $form->field($upload, 'image[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
