<?php 
use backend\models\OrderItem;
use yii\helpers\Html;
use backend\models\DeleteOrderItemLog;
use backend\models\DeleteOrdersLog;
use backend\models\Item;
use yii\helpers\Url;

//$orderitems=OrderItem::find()->where(['order_id'=>$order->order_id])->all();
if(!empty($r1))
{
	
	/*echo Html::tag('p','We Have Your Feedback For This Order!',['class'=>'container alert alert-danger']);
	echo '<script>alert("done")</script>';*/
	Yii::$app->getSession()->setFlash('danger','Your Order has been Cancelled!');
} 
if(!empty($r))
{
	
	/*echo Html::tag('p','We Have Your Feedback For This Order!',['class'=>'container alert alert-danger']);
	echo '<script>alert("done")</script>';*/
	Yii::$app->getSession()->setFlash('danger','We Have Your Feedback for This Order !');
} 


if(empty($fetchorder)&& empty($fetchpreviousorder))
{
	echo Html::tag('p','Your Orders History is Empty !',['class'=>'container alert alert-info']);
        							/*return $this->render('/site/cart.php',['var'=>var]);*/
    echo Html::img('images/cart/emptycart.png',['class'=>'center-block']);
    echo '<br><br><br>';
}
 

else
{
	
	if(!empty($fetchorder))
	{
		?>
		 <div class="container alert alert-success">
	           		Current Orders
	           </div>
	           <?php
	foreach($fetchorder as $order)
	        {

	           /* echo ' order-id :'.$order->order_id.'<br>';*/
	            $orderitems=OrderItem::find()->where(['order_id'=>$order->order_id])->all();
	            //$orderitems=OrderItem::find()->where(['order_id'=>$order->order_id])->all();

	           ?>
	          
				            <section id="cart_items">
				<div class="container">
					<!-- <?php echo 'STATUS  '.$order->status?> -->
					<div class="table-responsive cart_info" >
								<table class="table table-condensed" style="overflow-x:hidden;">
									
									<thead>
										<tr style="background: #1a0d00;color: white;">
											<td class="image" ><?php echo ' Order-Id :'.$order->order_id;?></td>
											<td class="description"><?php echo "Start Date: -".$order['order_start_date'] ;?></td>
											<td class="price"><?php echo "End Date: -".$order['order_end_date'];?></td>
											<td class="quantity"></td>
											<td class="total"><?php echo 'Status : '.$order->status;?></td>
											<td align="center">
												<?php  if($order->status=='Received'){?>
											<a href="<?=Url::to(['/site/cancelorder','order_id'=>$order->order_id])?>" style="color:red;">Cancel Order</a>
											<?php }?>
											
											</td>

										</tr>
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
										
									<?php $total=0; foreach($orderitems as $orderitem) {
								$item=Item::find()->where(['item_id'=>$orderitem->item_id])->One();
											?>

										<tr>
											<td class="cart_product">
												<p><a href=""><img src="images/product-details/<?php echo $item->image ?>" height="50px" width="50px" alt="photo" /></a></p>
											</td>
											<td class="cart_description" style="padding-left: 6%">
												<h4><a href=""></a><?=$order->order_id?></h4>
												<p>Web ID: <?=$orderitem->item_id?></p>
											</td>
											<td class="cart_price">
												<h4><a href=""></a><?=$orderitem->current_price?></h4>
											</td>
											<td class="cart_quantity">
												
										<input class="cart_quantity_input"  style="background: white;border: none" type="text" name="quantity" value="<?=$orderitem->qty_per_item?>" autocomplete="off" size="2" disabled>
												
											</td>
											<td class="total"><?=$orderitem->qty_per_item*$orderitem->current_price?></td>
											
										</tr>
										<?php $total=$total+$orderitem->current_price*$orderitem->qty_per_item;} ?>
										
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
														<td><i class="fa fa-inr"></i><?php $GST=$total*.09;echo $GST;?></td>
													</tr>
													
													<tr>
														<td><span>Total</span></td>
														<td><span><i class="fa fa-inr"></i><?=$total+$GST;?></span></td>
													</tr>
												</table>
											</td>
										</tr>
										
									</tbody>

								</table>
						
								<!-- <div><?php echo 'STATUS  '.$order->status;?></div> -->
							</div>
					</div>
				</section>

		<?php 
	     
	   } 
	}
	if(!empty($fetchpreviousorder))
	{?>
		<br><br>
		 <div class="container alert alert-info">
	           		Previous Orders
	           </div>
	           <?php
		foreach($fetchpreviousorder as $order)
	        {
/*	            echo ' order-id :'.$order->order_id.'<br>';
*/	            $orderitems=DeleteOrderItemLog::find()->where(['order_id'=>$order->order_id])->all();
	            //$orderitems=OrderItem::find()->where(['order_id'=>$order->order_id])->all();

	           ?>
				            <section id="cart_items">
				<div class="container">
					<div class="table-responsive cart_info">
								<table class="table table-condensed">
									<thead>
										<tr style="background: #1a0d00;color: white;">
											<td class="image" ><?php echo ' Order-Id :'.$order->order_id;?></td>
											<td class="description"></td>
											<td class="price"></td>
											<td class="quantity"></td>
											<td class="total"><?php echo 'Status : '.$order->status;?></td>
											<td align="center">
											<?php  if($order->status=='Returned'){?>
											<a href="<?=Url::to(['/site/feedback','order_id'=>$order->order_id])?>" style="color:yellow;">Feedback</a>
											<?php }?>
											</td>
										</tr>
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
										
										<?php $total=0;foreach($orderitems as $orderitem) {

											$item=Item::find()->where(['item_id'=>$orderitem->item_id])->One();
											?>

										<tr>
											<td class="cart_product">
												<p><a href=""><img src="images/product-details/<?php echo $item['image'] ?>" height="50px" width="50px" alt="photo" /></a></p>
											</td>

											<td class="cart_description" style="padding-left: 6%">
												<h4><a href=""></a><?=$order->order_id?></h4>
												<p>Web ID: <?=$orderitem->item_id?></p>
											</td>

											<td class="cart_price">
												<h4><a href=""></a><?=$orderitem->current_price?></h4>
											</td>
											<td class="cart_quantity">
											
													
													<input class="cart_quantity_input"  style="background: white;border: none" type="text" name="quantity" value="<?=$orderitem->qty_per_item?>" autocomplete="off" size="2" disabled>
												
												
											</td>
											<td class="total"><?=$orderitem->qty_per_item*$orderitem->current_price?></td>
										</tr>
										<?php $total=$total+$orderitem->current_price*$orderitem->qty_per_item;} ?>
										
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
														<td><i class="fa fa-inr"></i><?php $GST=$total*.09;echo $GST;?></td>
													</tr>

													
													<tr>
														<td><span>Total</span></td>
														<td><span><i class="fa fa-inr"></i><?=$total+$GST;?></span></td>
													</tr>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
					</div>
				</section>

		<?php 
	     
	   } 
	}

}
?>
