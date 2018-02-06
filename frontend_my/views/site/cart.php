<?php
use yii\helpers\Url; 
use yii\helpers\Html; 
use backend\models\Item;

$this->title = 'Cart';
?>
<section id="cart_items">
		<div class="container">
			<h1>Cart</h1>
			<?php
							  if(empty($saved_cart_items))
        		 				{
        							echo Html::tag('p','Your Cart is Empty !',['class'=>'alert alert-danger']);
        							/*return $this->render('/site/cart.php',['var'=>var]);*/
        							echo Html::img('images/cart/emptycart.png',['class'=>'center-block']);

        							echo '<br>'.'<br>';
            
        						} else{?>

			<div class="table-responsive cart_info" style="overflows: none;">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu" >
							<td class="image">Item</td>
							<td class="description"></td>
							
							<td class="quantity" align="center">Quantity</td>
							<td class="price">Price</td>
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

     				<!-- foreach(array_keys($carts) as $i)
					{
					    echo '<br>'.$i." ".$carts[$i]['quantity'].'<br>';
					} -->	

						<?php foreach(array_keys($saved_cart_items) as $i) {
							/*echo $i;*/

							$cart=Item::find()->where(['item_id'=>$i])->One();

							?>
						<tr>
							<td class="cart_product">
								<img src="images/product-details/<?php echo $cart['image']?>" height="60px" width="60px" alt="photo" />
							</td>
							<td class="cart_description" style="padding-left: 6%">
								<h4><?=$cart['name']?></h4>
								<p>Web ID: <?=$cart['item_id']?></p>
							</td>
							
							<td class="cart_quantity" align="center">
								<?=$saved_cart_items[$i]['quantity']?> 
							</td>
							<td class="cart_price">
								<p><i class="fa fa-inr"></i><?=$cart['rent_per_day']?></p>
							</td>
							
							<td class="cart_delete">
						<a class="cart_quantity_delete" href="<?=Url::to(['/site/delitem','id'=>$i])?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php }?>
					</tbody>
				</table>
			</div>
			
		</div>
	<!-- </section> 

	<section id="do_action"> -->
	<!-- 	<div class="container">
			
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
							<a class="btn btn-default update" href="">Update</a>
							
							<a style="position:relative;left:20px;" class="btn btn-default check_out" href="<?=Url::to(['/site/checkout'])?>">Check Out</a>
							
					</div>
				</div>
			</div>
		</div> -->
		<div class="container">
		<a style="position:relative;left:20px;" class="btn btn-default check_out" href="<?=Url::to(['/site/checkout'])?>">Proceed to Check Out</a>
		</div>
		<?php }?>
	</section><!--/#do_action-->