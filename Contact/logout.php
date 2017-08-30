<?php
   session_start();
  
   unset($_SESSION['login_user']);

   if(session_destroy()) {
	   setcookie('login_user','',time()-3600);
	    header("Location: login.php");
   }
?>