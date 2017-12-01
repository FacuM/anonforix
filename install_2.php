<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 include 'config.php';
 include 'top.php';
 include 'connect.php';
 include 'processreg.php';
 $query = "INSERT INTO `" . $credentials["db"] . "`.`" . $credentials["utable"] . "` (`username`, `password`, `mail`, `pin`, `utype`) VALUES ('" . $userdata["uusername"] . "', '" . $userdata["upassword"] . "', '" . $userdata["umail"] . "', '" . $userdata["upin"] . "', '5')";
 $loadquery = mysqli_query($server, $query);
?>