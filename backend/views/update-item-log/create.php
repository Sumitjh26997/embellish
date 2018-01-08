<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UpdateItemLog */

$this->title = 'Create Update Item Log';
$this->params['breadcrumbs'][] = ['label' => 'Update Item Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-item-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
