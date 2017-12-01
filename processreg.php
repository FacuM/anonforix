<?php
 $userdata = array (
  'uusername'	=> mysqli_real_escape_string($server, $_POST['username']),
  'upassword'	=> mysqli_real_escape_string($server, $_POST['password']),
  'umail'		=> mysqli_real_escape_string($server, $_POST['mail']),
  'upin'	=> mysqli_real_escape_string($server, $_POST['pin'])
  );
?>