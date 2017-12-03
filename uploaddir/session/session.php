<?php
   include($path . '/connect.php');
   session_start();
   
   $user = $_SESSION['logged'];
   
   $sqlsession = mysqli_query($server,"select username from " . $credentials["utable"]. " where username = '$user' ");
   
   $row = mysqli_fetch_array($sqlsession,MYSQLI_ASSOC);
   
   $logged = $row['username'];
   
   if(!isset($_SESSION['logged'])){
      header("location: " . $fullpath . "/session/login.php");
   }
?>