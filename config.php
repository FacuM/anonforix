<?php
 /* Edit these values with your MySQL server's credentials
 
 Note: 'utable' stands for 'users table' and 'atable' stands for 'administrators table'.*/
 
 $credentials = array (
  'hostname' => '127.0.0.1',
  'port' => '3306',
  'username' => 'root',
  'password' => '',
  'db' => 'anonforix_users',
  'utable' => 'anonforix_users',
  'atable' => 'anonforix_admins'
 );
 // From here, don't touch anything, we'll try to get everything up
 $serveraddress = $credentials["hostname"] . ":" . $credentials["port"];
?>