<?php
//Connect to tMYSQL 
$con = mysqli_connect("localhost", "root", "Surfer007z", "shoutit");

//Test connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
?>
