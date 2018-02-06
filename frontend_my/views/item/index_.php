
 <?php
//echo $_POST['iid'];
 use yii\helpers\Url;
 $images_of_item= count($itemimages);
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

                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							
							<?php for ($i = 1; $i < $images_of_item; $i++) {?>


							<li data-target="#slider-carousel" data-slide-to="$i"></li>

							<?php }?>
							
							
						</ol>
						
						<!-- <div id="similar-product" class="carousel slide" data-ride="carousel"> -->
							<div class="carousel-inner">
								<div class="active item">
									<img  style="width:500px;height:300px;" src="images/product-details/<?php echo $itemimages[0]->image ?>" width="200" height="50" alt="photo" />
								</div>
								<?php foreach($itemimages as $immg) {?>
								<div class="item">								
	                                        
	                             <img style="width:500px;height:300px;" src="images/product-details/<?php echo $immg->image ?>"  alt="photo">                                                         													
								</div>

								  <?php }?>			
								</div>	
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						
					</div>
                  <!-- </div> -->
                            <!-- retrieve other photos of the item-->
                           

                        </div>
                        <div class="col-sm-5">
                            <div class="product-information"><!--/product-information-->
                                <!-- new -->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />

                                <h2><?=$item->name?></h2>
                                <p>Item ID:<?=$item->item_id?></p>
                                
                                
                                <span>
                                    <span style="position:relative;left:0px;">US $59</span>
                                    
                                <?php if (!Yii::$app->user->isGuest) { ?> 
                                    <label >Quantity:</label>
                                    <form action="<?=Url::to(['/site/cart'])?>" method="post" >
                                                <input style="position:relative;top:-20px;left:120px;" type="hidden" name="qty" type="number" value=1>
                                                <input name="iid" type="hidden" value="<?=$item->item_id?>">
                                                <button  class="btn btn-default product-details"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
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