<style type="text/css">
   
.myslides {display:none;}
.w3-left, .w3-right,{cursor:pointer;color: white;background-color: #001a33; }
</style>
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

                  <div class="view-product" style="max-width:500px;max-height: 430px;">
                                 <button class="btn btn-default btn-arrow-left" title="Click to View Previous Picture"  style="color:black;border: none;right:1%;height:90%;position: relative;top: 215px;background: white;opacity:0.8;border-top-right-radius: 25px;border-bottom-right-radius: 25px;" onclick="plusDivs(-1)">&#10094;
                                </button>
                                <button class="btn btn-default btn-arrow-right" title="Click to View Next Picture" style="border:none;height:90%;position: relative;top: 215px;left: 86%;background: white;opacity:0.8;border-top-left-radius: 25px;border-bottom-left-radius: 25px;" onclick="plusDivs(1)">&#10095;</button> 
                               <!--  <img src="images\chevron-medium-left.svg" style="position: relative;top: 215px;height: 3%;width: 10%;" onclick="plusDivs(-1)">
                                <img src="images\chevron-medium-right.svg" style="position: relative;top: 210px;left: 80%;height: 3%;width: 10%;" onclick="plusDivs(1)"> -->
                                <img class="mySlides" src="images/product-details/<?php echo $item->image ?>" alt="" style="max-width:500px;max-height: 430px;border: none;"> 

                                 <?php for($i=0; $i < $images_of_item; $i++) {?>
                                 <img class="mySlides" src="images/product-details/<?php echo $itemimages[$i]->image ?>" alt="" style="max-width:500px;max-height: 430px;border: none;"> 
                                         <?php }?>

                            
                                
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
                                    <span style="position:relative;left:0px;"><i class="fa fa-inr"></i><?=$item->rent_per_day?></span>
                                    
                                <?php //if (!Yii::$app->user->isGuest) { ?> 
                                    
                                    <form action="<?=Url::to(['/site/cart'])?>" method="post" >
                                          <input name="iid" type="hidden" value="<?=$item->item_id?>">
                                          <h4>Quantity </h4><input style="position:relative;left:100px;top:-40px;" name="quantity" type="number" value="1">
                                                
                                                <button class="btn btn-default product-details"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                            </form>
                                <?php //}?>    
                                </span>
                                <hr>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                
                                <a href=""><img src="" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    
                    
                <!--     
                </div> -->
            </div>
        </div>
    </section>
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