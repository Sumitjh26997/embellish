<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\controllers\UserController;


          echo 'account_id'.' '.$accountuser;
          $this->title='Account';
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

</script>
<style type="text/css">
	input[type=text],[type=tel]
	{
		border-radius: 5px;
	}
	textarea
	{
		border-radius: 5px;
	}
	button
	{
		border-radius: 8px;
	}
</style>
	<section id="account">
		<div class="container">
			
			

			<div class="shopper-informations">
				<!-- <a href="<?=Url::to("index.php?r=user%2Fupdate&id=$accountuser")?>">link-UPdate</a>
				<a href="<?=Url::to("index.php?r=user%2Fdelete&id=$accountuser")?>">link-delete</a> -->

				<?= Html::a('Update', ['/user/update','id'=>$accountuser], ['class' => 'btn btn-primary']) ?>
        		<?= Html::a('Delete', ['delete', 'id' => $accountuser], [
            		'class' => 'btn btn-danger',
		            'data' => [
		                'confirm' => 'Are you sure you want to delete this item?',
		                'method' => 'post',
		            ],
		        ]) ?>

				
			</div>


		</div>
	</section> <!--/#cart_items-->

	

	


