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

			<div class="row">
						<div class=" shopper-info" style="margin-left: 15px;">
							<form action="" autocomplete="off">
							<br><br>
							<p>Name</p>
							
								<input type="text"  name="name" style="max-width: 300px;" onkeypress="return ValidateAlpha(event)" value="<?=$accountuserdetails->username?>" disabled/>
							<br><br>
							
							<p>Address</p>
								<textarea name="address" rows="5"  style="max-width: 300px;padding-left: 2px;padding-top: 2px;overflow: hidden;" disabled><?php echo $accountuserdetails->address; ?>									
								</textarea>
							
<!-- 							<p>Address</p>
								<input type="text" name="address" style="max-height:50px;" value="<?=$accountuserdetails->address?>" style="max-width: 300px;" disabled>
																	
								</input>
 -->
 							<br><br>
							
							<p>Phone</p>	
								<input type="tel" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" name="phone" value="<?=$accountuserdetails->phone?>" style="max-width: 300px;" disabled>
							
							<br><br>
							
								<!-- <button type="submit" class="btn btn-primary " href="" style="width: 300px;">Update</button> -->
							<?= Html::a('Update', ['/user/update','id'=>$accountuser], ['class' => 'btn btn-info']) ?>
        		<?= Html::a('Delete', ['/user/delete','id'=>$accountuser], ['class' => 'btn btn-danger',
		            'data' => [
		                'confirm' => 'Are you sure you want to delete this item?',
		                //'method' => 'post',
		            ],
		        ]) ?>
							</form>
							<br><br><br>
							
					</div>
					
				</div>
				<!-- <a href="<?=Url::to("index.php?r=user%2Fupdate&id=$accountuser")?>">link-UPdate</a>
				<a href="<?=Url::to("index.php?r=user%2Fdelete&id=$accountuser")?>">link-delete</a> -->

				

				
			


		</div>
	</section> <!--/#cart_items-->

	