<?php
use yii\helpers\Url;
include"conf.php"; 
?>
<div class="container">
			<div class="row">

				<div class="col-sm-3">
					<h2>Filters</h2>
						<div class="panel-group category-products" id="accordian">
					<!-- <div class="panel-group category-products" id="accordian"> --><!--category-productsr-->
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a>
											<span ></span> 
											Color
										</a>
									</h4>
								</div>
								<div id="color" >
									<div class="panel-body">
										<ul>
											<?php
												$query = "select distinct(color) from item ";
												$rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
												while($color_data = mysqli_fetch_assoc($rs)){ 
											?>
											<li><a href="javascript:void(0)"><input type="checkbox" class="item_filter color" value="<?php echo $color_data['color']; ?>"  >
					&nbsp;&nbsp; <?php echo $color_data['color']; ?></a><?php } ?></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a>
											<span ></span> 
											Material
										</a>
									</h4>
								</div>
								<div id="material" >
									<div class="panel-body">
										<ul>
											<?php
												$query = "select distinct(material) from item ";
												$rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
												while($material_data = mysqli_fetch_assoc($rs)){ 
											?>
											<li><a href="javascript:void(0)"><input type="checkbox" class="item_filter material" value="<?php echo $material_data['material']; ?>"  >
					&nbsp;&nbsp; <?php echo $material_data['material']; ?></a><?php } ?></li>
										</ul>
									</div>
								</div>
							</div>
                       
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Price</h4>
                                    <input type="hidden" class="price1" value="0" >
					                <input type="hidden" class="price2" value="3000"  >
									<p id="priceshow"></p>
					                <div id="slider-range"></div>
                                </div>
                            </div>

                        </div><!--/category-products-->
                    
                        
                    
                    <!-- </div> -->
               	
				</div>
				
				<!--all images of decor from itemimage table-->
				<div class='col-sm-9' id="product-data">
					<h2 class="title text-center"><input type="text" id="cat" value="<?= $cat ?>" style="display: none;" ><?= $cat ?> Items</h2>
						<?php foreach(array_keys($category) as $i ) {

							//echo $category[$i]->item_id ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">

											<img src="images/product-details/<?php echo $category[$i]->image?>" alt="photo" />
											
											<h2>&#8377;<?=$category[$i]->rent_per_day?></h2>
											<p><?=$category[$i]->name?></p>									
											<a href="<?=Url::to(['/site/product','id'=>$category[$i]->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
											
										</div>

										<div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$category[$i]->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
                                        </div>
                                    </div>
										
								</div>
								
							</div>
						</div>

						<?php }?>

						
			</div>
			
		</div>
	</div

<script src="js/jquery.js"></script>
<!-- <style>
#loaderpro{text-align:center; background: url('loader.gif') no-repeat center; height: 150px;}
</style> -->
	<script>
	var colour,brand,size;
	$(function(){
		$('.item_filter').click(function(){
			/*$('.product-data').html('<div id="loaderpro" style="" ></div>');
			,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()*/
			 color = multiple_values('color');
			 material  = multiple_values('material');
			 cat   = document.getElementById('cat').value;
			
            $.ajax({
				url:"ajax.php",
				type:'post',
				data:{color:color,material:material,cat:cat},
				success:function(result){
					$('.product-data').html(result);
				}
			});
		});
		
	});
	
	
	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		return val;
	}
	
	
  /*$(function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: 3000,
		  values: [ 100, 3000 ],
		  slide: function( event, ui ) {
			$( "#priceshow" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$( ".price1" ).val(ui.values[ 0 ]);
			$( ".price2" ).val(ui.values[ 1 ]);
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
			 color = multiple_values('color');
			 material  = multiple_values('material');
			 stock   = multiple_values('size');
            $.ajax({
				url:"ajax.php",
				type:'post',
				data:{color:color,material:material,stock:stock,sprice:ui.values[ 0 ],eprice:ui.values[ 1 ]},
				success:function(result){
					$('.product-data').html(result);
				}
			});
		  }
		});
		
		$( "#priceshow" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		 " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });	*/
	
</script>
	
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="js/jquery.js"></script>





			
		
