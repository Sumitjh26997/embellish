<?php
use yii\helpers\Url;

?>
<div class="container">
			<div class="row">

				<div class="col-sm-3">
					<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
					<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Furniture</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?=Url::to(['/site/decor'])?>">Decor</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Art</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div>
				</div>

				
				<!--all images of decor from itemimage table-->
				<div class='col-sm-9'>
					<h2 class="title text-center"><?=$id?> Items</h2>
					

                        <?php foreach($decors as $decor ) {?>
							 <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                     <img style="width:250px;height:150px;" src="images/product-details/<?php echo $decor->image?>" alt="photo" />
                                        <h2><i class="fa fa-inr"></i><?=$decor->item_id?></h2>
                                        <p><?=$decor->name?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>View</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$decor->item_id])?>" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>View</a>
                                        </div>
                                    </div>
                                    <!-- <img src="images/home/sale.png" class="new" alt="" /> -->
                                </div>
                                
                            </div>
                        </div>
                        <?php }?>


				</div>	
			</div>
			
		</div>

			
		
