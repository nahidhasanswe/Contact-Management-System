<?php
   include 'algorithm.php';
   session_start();
   
   if(!isset($_SESSION['login_user'])){

      if(isset($_COOKIE['login_user']))
      {
      	$_SESSION['login_user']=Decryption($_COOKIE['login_user']);

      }else
      {
      	header("location:login.php");
      }
   }
?>