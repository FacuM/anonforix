<?php
 // Login script
 include("../config.php");
 include($path . "/top.php");
 include($path . "/connect.php");
 if ( isset($_POST['username']) && isset($_POST['password']) ) {
	 $userdata = array (
	  'uusername' => mysqli_real_escape_string($server, $_POST['username']),
	  'upassword' => mysqli_real_escape_string($server, $_POST['password']),
	  'upin'	  => mysqli_real_escape_string($server, $_POST['pin'])
	 );
	 session_start();
	 $sql = "SELECT * FROM `" . $credentials["utable"] . "` WHERE `username` = '" . $userdata["uusername"] . "' and `password` = '" . $userdata["upassword"] . "' and `pin` = '" . $userdata["upin"] . "'";
     $result = mysqli_query($server,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $active = $row['active'];
     
     $count = mysqli_num_rows($result);
		
     if($count > 0) {
        $_SESSION['login_user'] = $userdata["uusername"];
        header("location: welcome.php");
	 } else {
		header("location: error.php");
	 } 
 } else {
	 if (!isset($_SESSION['login_user'])) {
      echo "
  <form action='' method='post' >
   <table>
    <tr>
     <td><b>&#9656; Username: </b>&nbsp;</td> <td><input type=text name='username' placeholder='Username' maxlength='25' ></td>
    </tr>
    <tr>
     <td><b>&#9656; Password: </b>&nbsp;</td> <td><input type=password name='password' placeholder='Password' maxlength='25' ></td>
    </tr>
    <tr>
     <td><b>&#9656; PIN: </b>&nbsp;</td> <td><input type=password name='pin' placeholder='PIN' maxlength='6' ></td>
    </tr>
   </table>
   <input type='submit' value='Login' >
  </form>
  </center>
  ";
	 } else {
		 echo "You can't login twice!";
	 }
 }
 include($path . "/footer.php");
?>