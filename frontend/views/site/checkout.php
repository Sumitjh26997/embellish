<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Item;
?>
<section id="cart_items">
		<div class="container">
			
					<?php
							  if(empty($vars))
        		 				{
        							echo Html::tag('p','Your Cart is Empty !',['class'=>'alert alert-danger']);
        							/*return $this->render('/site/cart.php',['var'=>var]);*/
        							echo Html::img('images/cart/emptycart.png',['class'=>'center-block']);

            
        						}
						else { ?>
			
			<div class="review-payment">
				<h2>Review Your Order</h2>
			</div>
			
			<div class="table-responsive cart_info">

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							
							<td class="quantity">Quantity</td>
							<td class="price">Price</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						
						<?php $total=0; foreach(array_keys($vars) as $i) {
							$cart=Item::find()->where(['item_id'=>$i])->One();
							?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/product-details/<?php echo $cart->image ?>" height="50px" width="50px" alt="photo" /></a>
							</td>
							<td class="cart_description" style="padding-left: 6%">
								<h4><a href=""><?=$cart->name?></a></h4>
								<p>Web ID: <?=$cart->item_id?></p>
							</td>
							
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								
									<input style="background:white;border:none;" class="cart_quantity_input" type="text" name="quantity" 
									value="<?=$vars[$i]['quantity']?>" autocomplete="off" size="2" disabled>
									
								</div>
							</td>
							<td class="cart_price">
								<p><i class="fa fa-inr"></i><?=$cart->rent_per_day?></p>
							</td>
							
							
						</tr>
						<?php $total=$total+$cart->rent_per_day*$vars[$i]['quantity']; }?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><i class="fa fa-inr"></i><?=$total?></td>
									</tr>
									<tr>
										<td>GST</td>
										<td><?php $GST=$total*0.09;echo $GST;?></td>
									</tr>
									<tr class="shipping-cost">
										<!-- <td>Shipping Cost</td>
										<td>Free</td>			 -->							
									</tr>
									<tr>
										<td>Total</td>
										<td><span><i class="fa fa-inr"></i><?=$total+$GST?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							
							<form name="pickups" id="pickups" action="<?=Url::to(['/site/confirmtocheckout/'])?>" method="post" >
							
								
								<select name="pickup_time">
									<!-- <option selected="true" disabled="true">Select Pickup Time</option> -->
									<option value="9am-12pm">9am-12pm</option>
									<option value="12pm-3pm">12pm-3pm</option>
									<option value="3pm-6pm">3pm-6pm</option>
								</select>
							</form>
							<br><br>
							<?php if (empty($vars)) { ?>
								<a class="btn btn-primary" href="#" disabled>Confirm</a>
							
							<?php } else {?>

							<button type="submit" class="btn btn-primary" form="pickups">Confirm</button><br><br><br>
							<?php }?>
							
						</div>
					</div>
					
									
				</div>
			</div>
			<?php }?>
		</div>
	</section> <!--/#cart_items-->

