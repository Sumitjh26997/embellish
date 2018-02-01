<?php
use yii\helpers\Url;
use yii\helpers\Html;
//echo $keyword;

//echo $result["name"];
/*foreach ($result as $item) {
	echo $item['name'];
}*/
if(!empty($result))
{
?>
<ul>
<?php
foreach($result as $item) {
?>
<li><a href="<?=Url::to(['/site/product','id'=>$item['item_id']])?>"><?php echo $item["name"]; ?></a></li>
<?php } ?>
</ul>
<?php } 
else{
echo "No result found";
}?>
