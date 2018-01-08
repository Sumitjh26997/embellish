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
					<h2 class="title text-center">Decor Items</h2>
						<?php foreach(array_keys($decors) as $i ) {

							//echo $decors[$i]->item_id ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">

											<img src="images/product-details/<?php echo $decorimages[$i]->image?>" alt="photo" />
											
											<h2>$56</h2>
											<p><?=$decors[$i]->item_id?></p>									
											<div class="row">	
												<div class="col-sm-6">
											<a href="<?=Url::to(['/item','id'=>$decors[$i]->item_id])?>" class="btn btn-default product-details">View Details</a>
											
												</div>
											
											<?php if (!Yii::$app->user->isGuest) { ?> 
											<form action="<?=Url::to(['/site/cart'])?>" method="post" >
												
												<input name="qty" type="hidden" value=1>

												<input name="iid" type="hidden" value="<?=$decors[$i]->item_id?>">
												<div class="col-sm-6">
												<button class="btn btn-default product-details"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
												</div>
											
											</form>
											<?php }?>
											</div>
											
										</div>
										
								</div>
								
							</div>
						</div>

						<?php }?>
				</div>	
			</div>
			
		</div>

			
		
