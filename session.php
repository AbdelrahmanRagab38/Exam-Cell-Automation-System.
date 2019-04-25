<?php
   include('init.php');
   session_start();
   $db = mysqli_select_db($conn,'srms');
   $user_check = $_SESSION['userid'];
   
   $ses_sql = mysqli_query($conn,"select userName from users where userName= '$user_check'");
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['userName'];
   
   if(!isset($_SESSION['userid'])){
      header("Location:login.php");
   }
?>