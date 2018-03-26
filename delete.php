<?php
	include('session.php');
	$file = $_GET['id'];
	$con = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
	unlink(getcwd()."/uploads/$user_check/$file");
	$query = "DELETE FROM `".$user_check."` WHERE name = '".$_GET['id']."'";
	mysqli_query($con, $query);
	
	header("location: index.php");
?>