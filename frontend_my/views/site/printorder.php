<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\OrderItem;
use backend\models\Item;

/* $session = Yii::$app->session;
$session->open();
$username=$session['username'];
$db = new yii\db\Connection([
    'dsn' => 'mysql:host=localhost;dbname=embellish_props',
    'username' => 'root',
    'password' => '12345',
    'charset' => 'utf8',
]); 

$post = Yii::$app->db->createCommand('SELECT * FROM user WHERE username=$user');
           ->queryOne();*/

?>


		    <script type="text/javascript">
            function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
     function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode;
        if (keyCode==32) 
        	return true;
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123 ))
             return false;
        return true;
    }
/*function printInfo() {
  var prtContent = document.getElementById("h");
var WinPrint = window.open('', '', 'left=0,top=0,width=1165,height=750,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}*/

function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>


<style type="text/css">
	input[type=text],[type=tel]
	{
		/*border-radius: 5px;
		*/border: none;
	}
	textarea
	{
		/*border-radius: 5px;
		*/border: none;
		background: none;
		color: #333;
	}
	button
	{
		border-radius: 8px;
	}
	.tdr
	{
		text-align: right;
	}
</style>

<div style="margin:2px;" id="cart_items">
	<section  style="border: solid black 2px;">
		<div class="container"  style="margin-left: 20px;">
			

			<div >
				<h2 class="heading"><img src="images/home/logo.png" alt="" height="60px" width="250px" /></h2>
			</div>
			

<br><br><br>
			<div class="shopper-informations">
				<div class="row">
					<!-- <div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								Name :<input type="text" placeholder="" value="Dhoom Machale dhoom tenenene">
								Mob No. :<input type="text" placeholder="" value="Dhoom Machale dhoom tenenene">
								Company Name :<input type="text" placeholder="" value="Dhoom Machale dhoom tenenene">
								Company Address :<textarea name="address" cols="20" rows="8" >Dhoom Machale dhoom tenenene</textarea>
								
							</form>
							
						</div>

					</div> -->
					
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p style="font-weight: bolder;">Embellish Store Info</p>
							<div class="form-one">
							<table>
								<tr><td style="width: 100px;" class="tdr">Contact&nbsp;Person&nbsp;Name:&nbsp;&nbsp;&nbsp;</td><td>HARDCODED</td></tr>
								<tr><td style="width: 100px;" class="tdr">Contact&nbsp;No:&nbsp;&nbsp;&nbsp;</td><td>HARDCODED</td></tr>
								
								<tr><td style="width: 100px;vertical-align: top;" class="tdr">Address:&nbsp;&nbsp;&nbsp;</td><td><textarea rows="8" style="width:200px;padding: 0px;" disabled>HARDCODEDHARDCODEDHARDCODEDHARDCODEDHARDCODEDHARDCODEDs</textarea></td></tr>
								
									
								</table>
							</div>
						</div>
							</div>
  					<div class="col-sm-4">
						<div class="shopper-info">
							<p style="font-weight: bolder;">Shopper Information</p>
							
								<table cellspacing="20" border="0px">
								<tr>
								<td class="tdr">Name:&nbsp;&nbsp;&nbsp;</td><td><?=$accountuser->username?>
								</td></tr>
								<tr>
								<td class="tdr">Mob&nbsp;No:&nbsp;&nbsp;&nbsp;</td><td><?=$accountuser->phone?>
								</td></tr>
								<tr>
								<td class="tdr">Company&nbsp;Name:&nbsp;&nbsp;&nbsp;</td><td><?=$accountuser->company?>
								</td></tr>
								<tr>
								<td class="tdr" style="vertical-align: top;">Company&nbsp;Address:&nbsp;&nbsp;&nbsp;</td><td><textarea rows="8" style="width:200px;padding: 0px;" disabled><?=$accountuser->address?></textarea>
							</td></tr>
							</table>
						<br><br><br>
								<table>
								<tr style="font-weight: bolder;"><td class="tdr">Pickup Time:&nbsp;&nbsp;&nbsp;<?php echo $fetchorder->pickup_time;?></td><td></td></tr>&nbsp;&nbsp;&nbsp;
								</table>
							
						</div>
					</div>  
		
							
							
									
									<!-- 
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax"> -->
								
							
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>		 -->			
				
			
			<div class="review-payment">
				<h2>Order Details</h2>
			</div>


			     
			<div class="container">
				<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead >
									<tr style="background: #1a0d00;color: white;">
											<td class="image" ><?php echo ' Order-Id :'.$fetchorder->order_id;?></td>
											<td class="description"></td>
											<td class="price"></td>
											<td class="quantity"></td>
											<td class="total"></td>
											<td></td>

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
									
									<?php $total=0; foreach($itemsinorder as $item) {
										$itemdetails = Item::find()->where(['item_id'=>$item->item_id])->one();
										?>


									<tr>
										<td class="cart_product">
											<p><img src="images/product-details/<?php echo $itemdetails->image ?>" height="50px" width="50px" alt="photo" /></p>
										</td>
										<td class="cart_description" style="padding-left: 6%">
											<h4><?=$itemdetails->name?></h4>
											<p>Web ID: <?=$itemdetails->item_id?></p>
										</td>
										<td class="cart_price">
											<h4><?=$item->current_price?></h4>
										</td>
										<td class="cart_quantity">
											<h4><?=$item->qty_per_item?></h4>
																	
											
										</td>
										<td>
											<h4><?=$item->current_price*$item->qty_per_item?></h4>
										</td>
									</tr>
									<?php $total=$total+$item->current_price*$item->qty_per_item;} ?>
									
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
													<td>&#8377;<?php $GST=$total*0.09;echo $GST;?></td>
												</tr>
												
												<tr>
													<td>Total</td>
													<td><span>&#8377;<?=$total+$GST?></span></td>
												</tr>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
				</div>
			

		</div>

	</section> <!--/#cart_items-->
	</div>
	
	<section>
		<div class="container">
			<a class="btn btn-primary" href="" onclick="printdiv('cart_items')">Print Order Receipt</a>
							
<br><br><br><br><br>
	

		</div>
	</section>
	
	


