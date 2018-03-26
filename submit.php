<?php
			// Create connection
			$conn = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
			
			//data
			$first_name   	= $_POST['first_name'];
			$last_name		= $_POST['last_name'];
			$password   	= $_POST['password'];
			$email      	= $_POST['email'];
			$conn2      	= new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
			
			if(isset($_POST['submit'])){
				 $SQL = "INSERT INTO upass (email, password) VALUES ('$email', PASSWORD('$password'))";
				 mysqli_query($conn, $SQL);
				 //$grant = "GRANT ALL PRIVILEGES ON *.* TO '$username'@'localhost';";
				 //mysqli_query($conn, $grant);
				 $create_table = "CREATE TABLE `".$email."` (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(400) NOT NULL, type VARCHAR(30) NOT NULL, size INT NOT NULL, path VARCHAR(700) NOT NULL, modified DATETIME NOT NULL);";
				 mysqli_query($conn2, $create_table);
				 $store_info = "INSERT INTO contacts (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
				 mysqli_query($conn2, $store_info);
				 $curdir = getcwd();
				 $dir = $curdir."/uploads/"."$email";
				 mkdir($dir,0755,true);
				 
				 
			}		
			mysqli_close($conn);
			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('HUYEAH! Welcome to the family! Log yourself in!')
				window.location.href='loginTest.html';
				</SCRIPT>");
?>