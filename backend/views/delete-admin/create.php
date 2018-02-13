<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeleteAdmin */

$this->title = 'Create Delete Admin';
$this->params['breadcrumbs'][] = ['label' => 'Delete Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
