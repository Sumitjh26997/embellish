<?php 
use yii\helpers\Url;
?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/product-details/<?php echo $model->image?>" />
                                        <h2>$<?=$model->item_id?></h2>
                                        <p><?=$model->name?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$model->item_id])?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
                                        </div>
                                    </div>
                                    <img src="images/home/sale.png" class="new" alt="" />
                                </div>
                                
                            </div>
                        </div>

                    <?php ?> 