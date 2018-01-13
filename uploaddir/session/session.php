<?php
   //require_once($path . "/config.php");
   require_once("../config.php");
   session_start();

   if(!isset($_SESSION['logged'])){
      header("location: " . $fullpath . "/session/login.php");
   }

   $user = $_SESSION['logged'];

   foreach ($server->query("select username from " . $credentials["utable"] . " where username = $user ") as $row) {
	   $logged = $row['username'];
   }
?>
