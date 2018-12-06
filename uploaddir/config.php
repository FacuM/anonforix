<?php


 // Edit these values with your MySQL server's credentials

 // Wheter to show errors or not
 //error_reporting(E_ERROR | E_PARSE);

 // Page info

 $pageinfo = array ('Anonforix', 'The non-JS forum!');

 $credentials = array (
  'hostname'    => '127.0.0.1',
  'port'        => '3306',
  'username'    => 'pmauser',
  'password'    => 'pmauser',
  'db'          => 'anonforix',
  'utable'      => 'anonforix_users',
  'ttable'      => 'anonforix_threads',
  'ptable'      => 'anonforix_posts',
  'ftable'      => 'anonforix_forums'
 );

 // Here, you can customize the website's accent and background colours, so the next time anyone visits it, it'll be dinamically updated

 $theme = array (
  'accent'		    => 'white',
  'background'		=> 'black',
  'menubg'	     	=> 'black'
 );
 // From here, don't touch anything, we'll try to get everything up

 // Start counting render time
 $time_start = microtime(true);

 // Set the full address for MySQL connection
 $serveraddress = $credentials["hostname"] . ":" . $credentials["port"];
 // Set the path to the modified source code (mandatory)
 $sourcecode = "https://github.com/FacuM/anonforix";
 // Check wether we'll be able to create and destroy sessions, if not, stop the website from working
 if (!file_exists('includes/session.php')) {
  die ('Can\'t find \'session.php\', please check your installation.');
 }
 // Open connection the DB
 $server = new PDO('mysql:host=' . $serveraddress . ';dbname=' . $credentials["db"] . ';charset=utf8', $credentials["username"], $credentials["password"]);

?>
