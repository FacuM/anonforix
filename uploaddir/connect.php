<?php
 // From here, don't touch anything, we'll try to get everything up
 require_once("config.php");
 $server = new PDO('mysql:host=' . $serveraddress . ';dbname=' . $credentials["db"] . ';charset=utf8', $credentials["username"], $credentials["password"]);
?>
