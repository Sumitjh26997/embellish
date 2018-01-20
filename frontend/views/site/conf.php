<?php 
$con = mysqli_connect('localhost','root','12345');											//code for database connectivity
if(!$con) echo 'cannot connect';
if(!mysqli_select_db($con,'embellish_props'))															//code for selecting database		
	echo 'cannot connect';
?>