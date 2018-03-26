<?php
   $conn2 = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
   session_start();
   
      // username and password sent from form 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = $_POST['email'];
      $password = $_POST['password']; 
      
      $sql = "SELECT * FROM upass WHERE email = '$email' AND password = PASSWORD('$password')";
      $result = mysqli_query($conn2,$sql);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $email and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $email;
         header("location: index.php");
      }else {
		 echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong Email/Password')
				window.location.href='loginTest.html';
				</SCRIPT>");

      }
   }
?>