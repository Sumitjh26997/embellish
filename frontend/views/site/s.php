<?php
use yii\helpers\Url;
use yii\helpers\Html;
include"conf.php";

$keyword=$_POST['keyword'];

$query = "SELECT * FROM item WHERE name like '%".$keyword."%'";
$result = mysqli_query($con,$query);

if(!empty($result)) {
?>
<ul id="search-list">
<?php
foreach($result as $item) {
?>
<li><a href="<?=Url::to(['/site/product','id'=>$item['item_id']])?>"><?php echo $item["name"]; ?></a></li>
<?php } ?>
</ul>
<?php } ?>