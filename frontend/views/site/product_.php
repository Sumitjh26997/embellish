<!-- <?php
  if (isset($_POST['submit'])) {
    $_SESSION['osd'] = $_POST['osd'];
    $_SESSION['oed'] = $_POST['oed'];
    echo $_SESSION['osd'] . " " . $_SESSION['oed'];
  }
?> -->
<style type="text/css">
   

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
   /* -webkit-transition: all 1.0s ease-in-out;
    -o-transition: all 1.0s ease-in-out;
    transition: all 1.0s ease-in-out;*/
    animation:animatezoom 0.6s}@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}
}

/* Modal Content */
.modal-content {
    /*background-color: #fefefe;*/
    margin: 5% 10% 10% 10%;
    padding: 20px;
    border: 1px solid #888;
    height: 80%;
    width: 80%;
    overflow: auto;
  background-color:#ffffff;
  font-family: calibri;
  /*-webkit-transition: all 1.0s ease-in-out;
    -o-transition: all 1.0s ease-in-out;
    transition: all 1.0s ease-in-out;*/
    animation:animatezoom 0.6s}@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}
}

.modal span{
  font-size: 35px;
  padding-left: 15px;
  padding-right: 15px;
  font-weight: bold;
  color: grey;
  border-radius: 50%;
  -webkit-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
}

.modal span:hover{
  color: #f57f20;
  background-color: #DEDFD1;
}

.video-container {
  position:relative;
  padding-bottom:56.25%;
  padding-top:30px;
  height:0;
  overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}

.myslides {display:none;}
.w3-left, .w3-right,{cursor:pointer;color: white;background-color: #001a33; }
</style>

 <?php
//echo $_POST['iid'];
 use yii\helpers\Url;
 use backend\models\Item;
 use backend\models\OrderItem;
 use backend\models\Orders;
 ?>
<?php if(!isset($_SESSION['osd']) || !isset($_SESSION['oed']))
{
  ?>
 <div id="dates">
<div class="modal-content">
    <span style="float:right;cursor:pointer;" onclick="document.getElementById('dates').style.display='none'">&times;</span><br><br>
    <center><h2>DATESET</h2></center>

    
<form action="<?=Url::to(['/site/product','id'=>$id])?> " method="POST" >
    Order Start Date : <input type="date" name="osd"><br><br>

    Order End Date : <input type="date" name="oed"><br><br>
    
     

   <button type="submit" name="submit">SET</button>
</form>
 <!-- <center><button form="registration" type="submit"> REgister</button></center> -->
  </div>
</div>

 <?php }
 else{

 $images_of_item= count($itemimages);

 $total_items=0;
  $toadd=0; 
  $outofstock=0;  
  $rt=0;

  $start_date=$_SESSION['osd'];
  $end_date=$_SESSION['oed'];
     
  //$start_date='2018-09-05';
  //$end_date='2018-09-27';
  //$start_date=strtotime($date);
  //$start_date=date($date);
  echo $start_date;

            $from_item = Item::find()->where(['item_id'=>$id])->one();

            $from_orderitems = OrderItem::find()->where(['item_id'=>$id])->all();

            foreach ($from_orderitems as $ouritem) {

               // echo "item_id:&nbsp".$ouritem['item_id']."<br>";
                $from_order = Orders::find()->where(['order_id'=>$ouritem->order_id])//order ids of same items 
                //->andWhere(['order_end_date'=>'2018-09-12'])
                ->one();
                
                //echo "order_id".$from_order['order_id']."<br>";
                //echo "order_end date".$from_order['order_end_date']."<br>";
               // echo "qty per item".$ouritem['qty_per_item']."<br>";
                //echo "start date".$from_order['order_start_date']."<br><br>";
                if($from_order['status']=='Received'||$from_order['status']=='Fulfilled')
                {
                  if($start_date < $from_order['order_end_date'] && $end_date < $from_order['order_start_date'])
                  {
                    //skip
                  }
                  else if($start_date <=$from_order['order_end_date'])
                //  echo "received";
                  $total_items=$total_items+$ouritem['qty_per_item'];//
                   //$total=min($total_items,$from_item['qty_on_order']);
                }

             /*   else if(
                  $from_order['status']=='Cancelled' ||
                  $from_order['status']=='Returned'
                  //|| $from_order['order_end_date']<$start_date
                  )
                {
                  //  echo "add";

                    $toadd=$toadd+$ouritem['qty_per_item'];
                    //next line is not neccessary in this case
                    $toadd=min($toadd,$from_item['qty_on_order']);
                }
                else
                {
                 // echo "else";
                }*/

            }

            //echo $total_items; echo $toadd;

           echo '<br>'."total ";echo $total_items;//"in store=".$from_item->quantity.'<br>';
           //echo '<br>'."toadd ";echo $toadd;

            $left=$from_item['quantity']-$total_items;//+$toadd;
            echo '<br>';echo $left;

                if($left==0)
                {
                  $outofstock=1;
                  $todisplay=0;

                }
                else if($left<$from_item->qty_on_order)
                {
                    $todisplay=$left;
                    echo "left";

                }
                else
                {
                    $todisplay=$from_item->qty_on_order;
                    echo "from_item";
                }

$cuser= Yii::$app->user->getId();
$cookie = isset($_COOKIE['cart_items_cookie'.$cuser]) ? $_COOKIE['cart_items_cookie'.$cuser] : "";
$cookie = stripslashes($cookie);
$saved_cart_items = json_decode($cookie, true);

        if(empty($saved_cart_items))
        {
            $saved_cart_items=array();  
        }
        else
        {
          print_r($saved_cart_items);
            if(array_key_exists($id,$saved_cart_items))
            {
              $rt=1;
            }

        }
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

                  <div class="view-product" style="max-width:500px;max-height: 430px;">
                                 <button class="btn btn-default btn-arrow-left" title="Click to View Previous Picture"  style="color:black;border: none;right:1%;height:90%;position: relative;top: 215px;background: white;opacity:0.8;border-top-right-radius: 25px;border-bottom-right-radius: 25px;" onclick="plusDivs(-1)">&#10094;
                                </button>
                                <button class="btn btn-default btn-arrow-right" title="Click to View Next Picture" style="border:none;height:90%;position: relative;top: 215px;left: 86%;background: white;opacity:0.8;border-top-left-radius: 25px;border-bottom-left-radius: 25px;" onclick="plusDivs(1)">&#10095;</button> 
                           
                                <img class="mySlides" src="images/product-details/<?php echo $item['image'] ?>" alt="" style="max-width:500px;max-height: 430px;border-radius: 7px;"> 

                                 <?php for($i=0; $i < $images_of_item; $i++) {?>
                                 <img class="mySlides" src="images/product-details/<?php echo $itemimages[$i]->image ?>" alt="" style="max-width:500px;max-height: 430px;border-radius: 7px;"> 
                                         <?php }?>

                            
                                
                            </div>
                  <!-- </div> -->
                            <!-- retrieve other photos of the item-->
                           

                        </div>
                        <div class="col-sm-5">
                            <div class="product-information"><!--/product-information-->
                                <!-- new -->
                                

                                <h2><?=$item->name?></h2>
                                <p>Item ID:<?=$item->item_id?></p>
                                
                                
                                <span>
                                   <form action="<?=Url::to(['/site/cart'])?>" method="post" >
                                  <table align="center">
                                    <tr>
                                    <td><span style="position:relative;left:0px;"><i class="fa fa-inr"></i><?=$item->rent_per_day?></span></td></tr>
                                    
                                <?php //if (!Yii::$app->user->isGuest) { ?> 
                                    
                                   
                                          
                                            <tr>
                                          <td><input name="iid" type="hidden" value="<?=$item->item_id?>"></td></tr>
                                          <tr>
                                            
                                            
                                              <?php if(!$outofstock) {
                                                if($rt==0){?>
                                                  <td><h4>Quantity </h4></td>
                                              
                                            <td><select name="quantity" value="<?=$todisplay?>" style="border:1px solid #331a00;background: none;">
                                                <?php for($i=1;$i<=$todisplay;$i++)
                                                {?>
                                              
                                              <option value="<?php echo $i?>"><?php echo $i?></option>

                                              <?php }?>
                                              </td>
                                              </tr>
                                              <tr>
                                                <?php if(!Yii::$app->user->isGuest){?>
                                              <td><button class="btn btn-default product-details" style="background:#331a00;color: white;"><i class="fa fa-shopping-cart"></i>&nbsp;Add to Cart</button></td>
                                              <?php }else{?>
                                              
                                              <td><a href="<?=Url::to(['/site/login'])?>" class="btn btn-default product-details" style="background:#331a00;color: white;"><i class="fa fa-shopping-cart"></i>&nbsp;Login</a></td>
                                             
                                              <?php }?>

                                            <?php }else{?>

                                              <td><a href="<?=Url::to(['/site/cart'])?>" class="btn btn-default product-details" style="background:#331a00;color: white;"><i class="fa fa-shopping-cart"></i>&nbsp;Added to Cart</a></td></tr>

                                            <?php }}
                                            else echo "out of stock"?>
                                            </select>
                                             
                                             <tr>


                                             
                                            </tr>
                                            
                                            
                                        
                                <?php //}?> 
                                  <!--  <button class="btn btn-default product-details"><i class="fa fa-shopping-cart"></i>dsCart</button> -->
                                  </table>
                                  </form>
                                </span>
                                <hr>
                                
                                
                                <!-- <a href=""><img src="" class="share img-responsive"  alt="" /></a> -->
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    
                    
                <!--     
                </div> -->
            </div>
        </div>
    </section>
    <?php }?>
    <script type="text/javascript">

var myIndex = 0;
//carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000); // Change image every 2 seconds
}

</script>
<script>
    var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }

  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

</script>