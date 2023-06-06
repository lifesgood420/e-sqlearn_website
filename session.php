<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"select felh from admin where felh = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_NUM);
   
   $login_session = $row[0];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>