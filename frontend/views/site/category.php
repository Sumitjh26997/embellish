<?php
use yii\helpers\Url;
$count=0;
$flag=0;
?>
<div class="container">
			<div class="row">

				<div class="col-sm-3">
					<h2>Filters</h2>
						<div class="panel-group category-products" id="accordian">
						
						<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a>Color</a></h4>
                                </div>
                                <div id="color" class="panel-collapse">
                                    <div class="panel-body">
                                        <ul>
                                        	<?php
                                        	foreach($color as $c)
                                        	{                                        		
                                            ?>
                                            <li><a>
                                            <input type="checkbox" onclick="filter();" class="item_filter color" value="<?php echo $c['color']?>" <?php if(in_array($c['color'],$colorcheck)){ echo"checked"; } ?> >&nbsp;&nbsp; <?php echo $c['color']?></a>
											</li>
											<?php }?>
                                        </ul>
                                    </div>
                                </div>
                        </div>

                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            Material
                                        </a>
                                    </h4>
                                </div>
                                <div id="material" class="panel-collapse">
                                    <div class="panel-body">
                                        <ul>
                                        	<?php
                                        	foreach($material as $m)
                                        	{                                        		
                                            ?>
                                            <li><a>
                                            <input type="checkbox" onclick="filter();" class="item_filter material" value="<?php echo $m['material']?>" <?php if(in_array($m['material'],$materialcheck)){ echo"checked"; } ?> >&nbsp;&nbsp; <?php echo $m['material']?></a>
											</li>
											<?php }?>
                                        </ul>
                                    </div>
                                </div>
                           </div>

						</div>
				</div>

				
				<!--all images of decor from itemimage table-->
				<div class='col-sm-9' id="product-data">
					<h2 class="title text-center"><input type="text" id="cat" value="<?= $cat ?>" style="display: none;" ><?= $cat ?> Items</h2>
						<?php foreach(array_keys($category) as $i ) {

                    if($count%3==0)
                    {

						$flag=3;		
							//echo $category[$i]->item_id ?>
                            <div class="row">
                                <?php }?>
				<div class="col-sm-4">
                <div id="product-data">
						
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
					</div>
						<?php 
                            $flag=$flag-1;
                            $count++;
                            if ($flag==0) {
                               ?>
                           </div>
                               <?php 
                            }

                    }
                        ?>
				
						
			</div>	
		</div>
</div>
</div><!-- check it out-->
<script src="js/jquery.js"></script>
<script type="text/javascript">
	
	var color,material;

	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		val.push("none");
		return val;
	}

	function filter(){
		color = multiple_values("color");
		material = multiple_values("material");
		cat = $("#cat").val();


		$.get( '<?= Url::toRoute('site/category')?>',{'cat':cat,'color':color,'material':material})
		.done(function(data){
            $('body').html(data);
        }) 
        .fail(function() {
        alert( "error" );
        })
	}
</script>	
