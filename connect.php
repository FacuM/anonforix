<?php
 // From here, don't touch anything, we'll try to get everything up
 include 'config.php';
 $server = mysqli_connect($serveraddress, $credentials["username"], $credentials["password"], $credentials["db"]);
?>