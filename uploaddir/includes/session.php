<?php
 if (isset($render))
 {
     session_start();

     if(!isset($_SESSION['logged'])){
        header("location: login.php");
     }
 }
?>
