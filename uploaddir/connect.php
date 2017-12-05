<?php
 // From here, don't touch anything, we'll try to get everything up
 include("config.php");
 $server = new PDO('mysql:host=' . $serveraddress . ';dbname=' . $credentials["db"] . ';charset=utf8', $credentials["username"], $credentials["password"]);
?>