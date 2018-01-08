
 <?php
//echo $_POST['iid'];
 use yii\helpers\Url;
?>
<section>
        <div class="container">
            <div class="row">
               <!--/brands_products-->
                        
                        <!--/price-range-->
                        
                        <!--/shipping-->
                        
              
                
               <!--  <div class="col-sm-12 "> -->
                
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-7">
                            <div class="view-product">
                                <img src="images/product-details/<?php echo $item->image ?>" alt="photo" />
                                <h3>ZOOM</h3>
                            </div>
                            <!-- retrieve other photos of the item-->
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                          <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                        
                                    </div>

                                  <!-- Controls -->
                                  <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                            </div>

                        </div>
                        <div class="col-sm-5">
                            <div class="product-information"><!--/product-information-->
                                <!-- new -->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />

                                <h2><?=$item->id?></h2>
                                <p>Item ID:<?=$item->item_id?></p>
                                
                                
                                <span>
                                    <span style="position:relative;left:0px;">US $59</span>
                                    
                                <?php if (!Yii::$app->user->isGuest) { ?> 
                                    <label style="position:relative;top:10px;left:50px;">Quantity:</label>
                                    <form action="<?=Url::to(['/site/cart'])?>" method="post" >
                                                <input style="position:relative;top:-20px;left:120px;" name="qty" type="number" value=0>
                                                <input name="iid" type="hidden" value="<?=$item->item_id?>">
                                                <button style="position:relative;top:0px;left:0px;" class="btn btn-default product-details"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                            </form>
                                <?php }?>    
                                </span>
                                <hr>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <a href=""><img src="" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    
                    
                <!--     
                </div> -->
            </div>
        </div>
    </section>