<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111700045-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111700045-1');
    </script>

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
    <link rel="shortcut icon" href="E.png">

    <title>Embellish | Click It, Rent It, Prop It!</title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="E.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="mailto:kanchan@embellish.store"><i class="fa fa-envelope"></i> kanchan@embellish.store</a></li>
                                <li><a href="">|</a></li>

                                <li><a href="mailto:sneha@embellish.store"><i class="fa fa-envelope"></i> sneha@embellish.store</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
         <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/logo.png" height="30" width="150" alt="" /></a>
                        </div>
                    
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                
                                
                                <!-- <li><a href="<?=Url::to(['/site/checkout'])?>"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
                                
                            <?php if (Yii::$app->user->isGuest) { ?>                                       
                                <li><a href="<?=Url::to(['/site/login'])?>"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="<?=Url::to(['/site/signup'])?>"><i class="fa fa-lock"></i> Sign Up</a></li>
                               
                                 <?php } else{?>

                                    <li><a href="<?=Url::to(['/site/cart','message'=>'unset'])?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="<?=Url::to(['/site/order'])?>"><i class="fa fa-crosshairs"></i> Orders</a></li>
                                    <li><a href="<?=Url::to(['/site/account'])?>"><i class="fa fa-user"></i> Account</a></li>
                                    
                                    <?php      

                                    echo '<li style="position:relative;top:-5px;"><a>'.Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->username . ')',
                                            ['tag'=>'<i>',
                                            'class' => 'fa fa-unlock btn btn-link logout']
                                        )
                                        . Html::endForm().'</a></li>';      
                                 }
                                ?>
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                             <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?=Url::to(['/site/index'])?>" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=Url::to(['/site/decor','id'=>'decor'])?>">Decor</a></li>
                                        <li><a href="#">Furniture</a></li> 
                                        <li><a href="#">Art</a></li> 
                                        <li><a href="#">Exclusives</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                
                                <li><a href="<?=Url::to(['/site/feedback'])?>">Feedback</a></li>
                            </ul>

                    </div>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
