<?php
include"conf.php"

$color = "";
$material = "";
$colour = isset($_REQUEST['color'])?$_REQUEST['color']:"";
$material = isset($_REQUEST['material'])?$_REQUEST['material']:"";
$cat = $_POST['cat'];

$query = "SELECT * FROM item where category = '$cat'";
	if(!empty($color)){
		$colordata =implode("','",$color);
	    $query  .= "AND color in('$colordata')"; 
	}
					  
	if(!empty($brand)){
		$materialdata =implode("','",$material);
		$query  .= " AND material in('$materialdata')"; 
	}

	$result = mysqli_query($con,$query) or die("Error : ".mysql_error());

	while($category = mysqli_fetch_assoc($result)){
?>
<div id="product-data">
	<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<!-- <img src="images/product-details/<?php echo $category->image?>" alt="photo" /> -->
											
											<h2>&#8377;<?=$category->rent_per_day?></h2>
											<p><?=$category->name?></p>									
											<a href="<?=Url::to(['/site/product','id'=>$category->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
											
										</div>

										<div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$category->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
                                        </div>
                                    </div>
										
								</div>
								
							</div>
						</div>
</div>
	<?php }?>