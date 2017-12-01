<?php
 // Edit these values with your MySQL server's credentials
 
 $credentials = array (
  'hostname' => '127.0.0.1',
  'port' => '3306',
  'username' => 'root',
  'password' => '',
  'db' => 'anonforix_users',
  'utable' => 'anonforix_users'
 );

 
 // Here, you can customize the website's accent and background colours, so the next time anyone visits it, it'll be dinamically updated

 $theme = array (
  'accent'		=> 'white',
  'background'	=> 'black',
  'menubg'		=> 'black'
 );
 // From here, don't touch anything, we'll try to get everything up
 $serveraddress = $credentials["hostname"] . ":" . $credentials["port"];
?>