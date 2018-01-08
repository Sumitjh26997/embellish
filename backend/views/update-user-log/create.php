<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UpdateUserLog */

$this->title = 'Create Update User Log';
$this->params['breadcrumbs'][] = ['label' => 'Update User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-user-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
