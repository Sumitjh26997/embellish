<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <?= Html::csrfMetaTags() ?>
     <title><?= Html::encode($this->title) ?></title>-->
    <?php $this->head() ?>
     <meta charset="utf-8">
    <meta name="title" content="Embellish">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="ROBOTS" content="Art Directors,Art Assistants,Art Design,Furniture Booking,Furnishings,Furniture, Art, Decor, Furniture Renting, Art Renting, Decor Renting, Furniture Decor Art Renting, Prop Rentals, Prop Renting, Home Decor, Design and Decor Consultants, Film Sets,Film Shoots,Film Shoots,Crockery,Paintings,Chairs,Sofas,Frames,Barstools,Wardrobes,Beds,Tables,Console Tables,Coffee Tables,Benches,Garden Decor,Planters,Photos,Plates,Bowls,Glasses,Candle Stands,Candle Holders,Linen,Curtains,Cushions,Cushion Covers,Wine Glasses,Teapots,Teasets,Mugs">
    <meta name="description" content="Furniture,art,decor rentals for designing film sets for film shoots">
    <meta name="abstract" content="Furniture,art,decor renting for film sets">
    <meta name="author" content="www.embellish.store">
    <meta name="publisher" content="www.embellish.store">
    <meta name="copyright" content="www.embellish.store">
    <meta name="revisit-after" content="2 days">
    <link rel="shortcut icon" href="assets/img/fav.png">

    <title>Embellish | Click It, Rent It, Prop It!</title>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    /*NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();*/
    ?>

    <div class="">
        <!--<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>-->
        <?= Alert::widget() ?>
        <?= $this->render('header') ?>
        <?= $content ?>
        <?= $this->render('footer') ?>
    </div>
</div>
<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
