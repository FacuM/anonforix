<?php
 // Edit these values with your MySQL server's credentials

 // Wheter to show errors or not
 error_reporting(E_ERROR | E_PARSE);
 
 // Page info
 
 $pageinfo = array ('Anonforix', '');
 
 $credentials = array (
  'hostname' => '127.0.0.1',
  'port' => '3306',
  'username' => 'root',
  'password' => '',
  'db' => 'anonforix_users',
  'utable' => 'anonforix_users'
 );
 
 /* Oh, please don't forget to define the root of your installation.
 
 Let suppose that you've installed Anonforix in '/var/www/anonforix', then, you should fill in here with '/anonforix'.*/

 $rootdir = '/anonforix/uploaddir';
 
 // Here, you can customize the website's accent and background colours, so the next time anyone visits it, it'll be dinamically updated

 $theme = array (
  'accent'		=> 'white',
  'background'	=> 'black',
  'menubg'		=> 'black'
 );
 // From here, don't touch anything, we'll try to get everything up
 $serveraddress = $credentials["hostname"] . ":" . $credentials["port"];
 $fullpath = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $rootdir;
?>