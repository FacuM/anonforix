<?php
 if (!isset($frominstall)) { $frominstall = false; } $render = true; require_once 'includes/head.php';
 if ( isset($userlevel) ) { $userlevel = $userlevel; } else { $userlevel = 1; }
 if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['pin']) ) {
  if (!$frominstall && !strpos($_POST['mail'], '@')) {
   echo("<p>Please type a valid mail address and try again.</p>
   </center>");
   require_once 'footer.php';
   exit();
  }

  $result = $server->query("SELECT * FROM " . $credentials["utable"] . " WHERE username=" . $server->quote($_POST['username']) . " ");
  $count = $result->rowCount();
  if ($count > 0)
    {
	  die("The user you're trying to register is already existing. Please go back and try again.");
	}
  else
	{
      $result = $server->query("SELECT * FROM " . $credentials["utable"] . " WHERE mail=" . $server->quote($_POST['mail']) . " ");
      $count = $result->rowCount();
	  if ($count > 0) {
        die("The mail address you're trying to register is already existing. Please go back and try again.");
	  } else {
       $server->query("INSERT INTO `" . $credentials["db"] . "`.`" . $credentials["utable"] . "` (`username`, `password`, `mail`, `pin`, `utype`) VALUES (" . $server->quote($_POST['username']) . ", " . $server->quote($_POST['password']) . ", " . $server->quote($_POST['mail']) . ", " . $server->quote($_POST['pin']) . ", " . $userlevel . ")");
	   echo "<p>We're all set, you can now <a href='login.php' >login.</a><br><br>Please don't forget to remove the <b>install</b> directory from your server.";
	  }
 	}
 } elseif ( isset($_POST['username']) || isset($_POST['password']) || isset($_POST['mail']) || isset($_POST['pin']) ) {
	 die("<p>All values must be filled, please go back and fill all of them. Then, try again.</p>
	 </center>")
	 ;
 } else {
  echo "
  <form class='register' action='' method='post' >
   <table>
    <tr>
     <td><b>&#9656; Username: </b></td><td><input type=text name='username' placeholder='Username' maxlength=25 ></td>
    </tr>
	<tr>
     <td><b>&#9656; Password: </b></td><td><input type=password name='password' placeholder='Password' maxlength=25 ></td>
    </tr>
	<tr>
     <td><b>&#9656; Mail address: </b></td><td><input type=text name='mail' placeholder='Mail address' maxlength=100 ></td>
    </tr>
    <tr>
	 <td><b>&#9656; PIN: </b></td><td><input type=numeric name='pin' placeholder='PIN' maxlength=6 >
	</tr>
   </table>
   <input type='submit' value='Register' >
   </form>
  </center>
  ";
 }
 require_once 'includes/footer.php';
?>
