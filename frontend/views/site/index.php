<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

?>    

 
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-mbellish</h1>
                                    <h2>First ever of its Kind!</h2>
                                    <p>Click it&nbsp,Rent it&nbsp,Prop it.</p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-mbellish</h1>
                                    <h2>Countless Things to Choose</h2>
                                    <p>Click it,Rent it,Prop it.</p>

                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-mbellish</h1>
                                    <h2>At Price so Low  </h2>
                                    <p>Click it,Rent it,Prop it.</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                         <?php foreach($categories as $category) {?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="<?=Url::to(['/site/category','cat'=> $category['type'],'color'=>'none','material'=>'none'])?>"><?= $category['type']?></a></h4>
                                </div>
                            </div>
                           <?php }?>
                        </div><!--/category-products-->
                    
                        
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        
                      
                        <?php foreach($items as $decor ) {?>
                             <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                     <img style="width:250px;height:150px;" src="images/product-details/<?php echo $decor['image']?>" alt="photo" />
                                        <h2><i class="fa fa-inr"></i><?=$decor['rent_per_day']?></h2>
                                        <p><?=$decor['name']?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>View</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$decor['item_id']])?>" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>View</a>
                                        </div>
                                    </div>
                                    <!-- <img src="images/home/sale.png" class="new" alt="" /> -->
                                </div>
                                
                            </div>
                        </div>
                        <?php }?>
                        
                    </div><!--features_items-->
                    
                    
                   
                    
                </div>
            </div>
        </div>
    </section>
