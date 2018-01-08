<?php
use yii\helpers\Url; 
use yii\helpers\Html; 
$this->title = 'Cart';
?>
<section id="cart_items">
		<div class="container">
			<h1>Cart</h1>
			<?php
							  if(empty($carts))
        		 				{
        							echo Html::tag('p','Your Cart is Empty !',['class'=>'alert alert-danger']);
        							/*return $this->render('/site/cart.php',['var'=>var]);*/
        							echo Html::img('images/cart/emptycart.png',['class'=>'center-block']);
            
        						} else{?>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
				<!-- 		foreach(array_keys($codes) as $i) {

     echo '<tr><td>';
     echo ($i + 1);
     echo '</td><td>';
     echo $codes[$i];
     echo '</td><td>';
     echo $names[$i];
     echo '</td></tr>';} -->

						<?php foreach(array_keys($carts) as $i ) {
							echo $carts[$i]->item_id ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/product-details/<?php echo $cartimages[$i]->image ?>" height="50px" width="100px" alt="photo" /></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$carts[$i]->name?></a></h4>
								<p>Web ID: <?=$carts[$i]->item_id?></p>
							</td>
							<td class="cart_price">
								<p><?=$carts[$i]->rent_per_day?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value=1 autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
						<a class="cart_quantity_delete" href="<?=Url::to(['/site/delitem','id'=>$carts[$i]->item_id])?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			
		</div>
	<!-- </section> 

	<section id="do_action"> -->
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							<?php if (empty($carts)) { ?>
							<a style="position:relative;left:20px;" class="btn btn-default check_out" href="<?=Url::to(['/site/checkout'])?>" disabled>Check Out</a>
							<?php }else{?>
							<a style="position:relative;left:20px;" class="btn btn-default check_out" href="<?=Url::to(['/site/checkout'])?>">Check Out</a>
							<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</section><!--/#do_action-->