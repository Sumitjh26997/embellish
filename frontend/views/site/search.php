<?php
use yii\helpers\Url;
use yii\helpers\Html;

if(!empty($result))
{
?>

<div id="search_list" class="" style="position: absolute;z-index: 1;background-color: #F0F0E9;min-width: 100%;">
<ul style="padding-left: 10px;">
<?php
foreach($result as $item) {
?>
<li><a href="<?=Url::to(['/site/product','id'=>$item['item_id']])?>" style="color: #331a00;"><?php echo $item["name"]; ?></a></li>
<?php } ?>
</ul>
</div>
<?php } 
else{
echo "No result found";
}?>
