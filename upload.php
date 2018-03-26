<?php
	include('session.php');
	$con = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
	$target_dir = getcwd()."/uploads/".$user_check."/".$name;
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	if(isset($_POST['btn-upload']) && $_FILES['file']['size'] > 0)
	{     
		$fileName = $_FILES['file']['name'];
		$tmpName  = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileType = $_FILES['file']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}

		$query = "INSERT INTO `".$user_check."` (name, type, size, path, modified ) ".
		"VALUES ('$fileName', '$fileType', '$fileSize', '$target_file', NOW())";
		mysqli_query($con, $query); 
		
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		
		header('location:index.php?status=success'); 
	}
?>