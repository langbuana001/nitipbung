<?php
   session_start();
   $conn2 = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn2,"SELECT * FROM upass WHERE email = '$user_check' ");
   $name_sql = mysqli_query($conn2,"SELECT * FROM contacts WHERE email = '$user_check' "); 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $contacts = mysqli_fetch_array($name_sql,MYSQLI_ASSOC);
   $first_name = $contacts['first_name'];
   if(!isset($_SESSION['login_user'])){
      header("location:landing.html");
   }
?>