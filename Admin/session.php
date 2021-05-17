<?php
    //Session.php will verify the session, if there is no session it will redirect to login page.

    include('../server.php');
    session_start();
   
   $user_check = $_SESSION['login_id'];
   $user_role = $_SESSION['login_role'];

   //check if the user is all ready logged in. if no, the page will be redirected in login form instead of main panel
   if(!isset($_SESSION['login_id'])){
      header("location:login.php");
      die();
   }
?>