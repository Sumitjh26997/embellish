<?php
use yii\helpers\Url;
use yii\helpers\Html;


?>

<!--
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
				<div class="row">
						<div class="shopper-info" style="margin-left: 15px;">
							<form action="" autocomplete="off">
							<br><br>
							<p>Order ID</p>
							
								<input type="text"  name="name" style="max-width: 300px;" onkeypress="return ValidateAlpha(event)" disabled>
							<br><br>
							
							<p>Feedback</p>
								<textarea name="address" cols="20" rows="3" style="max-width: 300px;" required></textarea>
							<br><br>
							
							<p>Rating</p>	
								<input type="tel" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" name="phone" style="max-width: 300px;">
							
							<br><br>
							
								<button type="submit" class="btn btn-primary " href="" style="width: 300px;">Update</button>
							
							</form>
							<br><br><br>
					</div>
					
				</div>
			</div>


		</div>
	</section> 

	

	

 -->

 <style type="text/css">
	input[type=text],[type=tel],[type=email],textarea
	{
		border-radius: 5px;
		border:1px solid black;
	}

/*.star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}*/

.rate-area {
  float: left;
  border-style: none;
}

.rate-area:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0,0,0,0);
}

.rate-area:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 .1em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  line-height: 1.2;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}

.rate-area:not(:checked) > label:before { content: '★ '; }

.rate-area > input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px #c60;
  font-size: 200% !important;
}

.rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: gold; }

.rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}

/*.rate-area > label:active {
  position: relative;
  top: 2px;
  left: 2px;*/
}
</style>
<!-- <script type="text/javascript">
	var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>


 -->



 <div class="container">
 					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Give your valuable feedback</h2>
								<form action="feed_submit.php" method="post">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<input type="text" value="<?=$accountuserdetails->username?>" disabled>
									<div class="blank-arrow">
										<label>Order-ID</label>
									</div>
									<input type="text" value="<?=$order_id?>" disabled>
									<div class="blank-arrow">
										<label>Rating</label>
									</div>

<!--      <div class="star-rating">
        <span class="fa fa-star-o" data-rating="1"><input type="radio" value="1"></span>
        <span class="fa fa-star-o" data-rating="2"><input type="radio" value="2"></span>
        <span class="fa fa-star-o" data-rating="3"><input type="radio" value="3"></span>
        <span class="fa fa-star-o" data-rating="4"><input type="radio" value="4"></span>
        <span class="fa fa-star-o" data-rating="5"><input type="radio" value="5"></span>
        <input type="hidden" name="rating" class="rating-value" value="">
      </div>
 --> 		
<ul class="rate-area">
  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
</ul>
 						
							</div>
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Feedback</label>
									</div>
									<textarea name="message" rows="11" style="background: #d6d6c2;" placeholder="Give your feedback" required="true"></textarea>
									<button type="submit" class="btn btn-primary" >Submit</button>
								</div>
							</div> 
							 </form>
						</div>
					</div><!--/Repaly Box-->
</div>
