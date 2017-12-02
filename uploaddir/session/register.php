<?php
 include("../config.php");
 include($path . "/connect.php");
 if (!isset($frominstall)) { $frominstall = false; }
 if (!$frominstall) { include($path . "/top.php"); }
 if ( isset($userlevel) ) { $userlevel = $userlevel; } else { $userlevel = 1; }
 if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['pin']) ) {

  include($path . "/connect.php");
 
  $userdata = array (
   'uusername'	=> mysqli_real_escape_string($server, $_POST['username']),
   'upassword'	=> mysqli_real_escape_string($server, $_POST['password']),
   'umail'		=> mysqli_real_escape_string($server, $_POST['mail']),
   'upin'		=> mysqli_real_escape_string($server, $_POST['pin'])
  );
  
  $query = "SELECT * FROM " . $credentials["utable"] . " WHERE username='" . $userdata["uusername"] . "' ";
  $result = mysqli_query($server,$query);
  $row = mysqli_fetch_assoc($result);
  if (count($row) > 1) 
    { 
	  die("The user you're trying to register is already existing. Please go back and try again.");
	}
  else
	{
      $query = "SELECT * FROM " . $credentials["utable"] . " WHERE mail='" . $userdata["umail"] . "' ";
	  $result = mysqli_query($server,$query);
      $row = mysqli_fetch_assoc($result);
	  if (count($row) > 1 ) {
        die("The mail address you're trying to register is already existing. Please go back and try again.");
	  } else {
       $query = "INSERT INTO `" . $credentials["db"] . "`.`" . $credentials["utable"] . "` (`username`, `password`, `mail`, `pin`, `utype`) VALUES ('" . $userdata["uusername"] . "', '" . $userdata["upassword"] . "', '" . $userdata["umail"] . "', '" . $userdata["upin"] . "', " . $userlevel . ")";
	   $loadquery = mysqli_query($server, $query);
	   echo "<p>We're all set, you can now <a href='" . $fullpath . "/session/login.php' >login.</a><br><br>Please don't forget to remove the <b>install</b> directory from your server.";
	  }
 	}
 } elseif ( isset($_POST['username']) || isset($_POST['password']) || isset($_POST['mail']) || isset($_POST['pin']) ) {
	 die("<p>All values must be filled, please go back and fill all of them. Then, try again.</p>
	 </center>")
	 ;
 } else {
  echo "
  <form action='' method='post' >
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
 include ($path . "/footer.php");
?>