<?php
 // Measure the time from taken to process the scripts, as shown in PHP.net.
 function microtime_float()
 {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
 }

 $time_start = microtime_float();

 // Edit these values with your MySQL server's credentials

 // Wheter to show errors or not
 //error_reporting(E_ERROR | E_PARSE);

 // Page info

 $pageinfo = array ('Anonforix', 'The non-JS forum!');

 $credentials = array (
  'hostname' 	 => '127.0.0.1',
  'port' 	 => '3306',
  'username' 	 => 'root',
  'password' 	 => '',
  'db' 		 => 'anonforix_users',
  'utable' 	 => 'anonforix_users',
  'ttable' 	 => 'anonforix_threads',
  'ptable' 	 => 'anonforix_posts',
  'ftable' 	 => 'anonforix_forums'
 );

 // Delay for redirects (default 5 seconds)

 $redirt = 2;

 /* Oh, please don't forget to define the root of your installation.

 Lets suppose that you've installed Anonforix in '/var/www/anonforix', then, you should fill in here with '/anonforix'.*/

 $rootdir = '/anonforix/uploaddir';
 $path = $_SERVER['DOCUMENT_ROOT'] . $rootdir;

 // Here, you can customize the website's accent and background colours, so the next time anyone visits it, it'll be dinamically updated

 $theme = array (
  'accent'		=> 'white',
  'background'		=> 'black',
  'menubg'		=> 'black'
 );
 // From here, don't touch anything, we'll try to get everything up

 // Set the full address for MySQL connection
 $serveraddress = $credentials["hostname"] . ":" . $credentials["port"];
 // Set the full path in URL format
 $fullpath = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $rootdir;
 // Check wether we'll be able to create and destroy sessions, if not, stop the website from working
 if (!file_exists($path . "/session/session.php")) {
  die ("Can't find 'session.php', please check your installation.<br><br>Root dir path: " . $path);
 }
?>
