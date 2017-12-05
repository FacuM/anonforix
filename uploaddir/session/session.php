<?php
   include($path . '/connect.php');
   session_start();
   
   $user = $_SESSION['logged'];

   foreach ($server->query("select username from " . $credentials["utable"] . " where username = $user ") as $row) { 
	   $logged = $row['username']; 
   }
   
   if(!isset($_SESSION['logged'])){
      header("location: " . $fullpath . "/session/login.php");
   }
?>