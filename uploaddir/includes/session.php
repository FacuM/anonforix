<?php
 if (isset($render))
 {
     session_start();

     $user = $_SESSION['logged'];

     foreach ($server->query("select username from " . $credentials["utable"] . " where username = $user ") as $row) {
  	   $logged = $row['username'];
     }

     if(!isset($_SESSION['logged'])){
        header("location: login.php");
     }
 }
?>
