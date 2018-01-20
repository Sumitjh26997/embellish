<?php 
$con = mysqli_connect('localhost','root','12345');											//code for database connectivity
if(!$con) echo 'cannot connect';
if(!mysqli_select_db($con,'embellish_props'))															//code for selecting database		
	echo 'cannot connect';

$cat = $_POST['cat'];

$query = "SELECT * FROM item where category = '$cat'";
	
if(!mysqli_query($con,$query))
{
	echo "false"
	echo("Errorcode: " . mysqli_errno($con));
}	
else
{
	echo "true";
}