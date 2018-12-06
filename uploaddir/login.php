<?php
 // Login script
 $render = true; require_once 'includes/head.php';
 if ( isset($_POST['username']) && isset($_POST['password']) ) {
	 session_start();
	 $sql = "SELECT * FROM `" . $credentials["utable"] . "` WHERE `username` = " . $server->quote($_POST['username']) . " and `password` = " . $server->quote($_POST['password']) . " and `pin` = " . $server->quote($_POST['pin']);
     $result = $server->query($sql);

     $count = $result->rowCount();

     if($count > 0) {
        $_SESSION['logged'] = $server->quote($_POST['username']);
        header("location: welcome.php");
	 } else {
    echo "
     <p>Unable to log in: no match for username/password combination.</p>
    </center>
    ";
	 }
 } else {
	 if (!isset($_SESSION['logged'])) {
      echo "
  <form action='login.php' method='post' >
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
   <input type='submit' name='submit' value='Login' >
  </form>
  </center>
  ";
	 } else {
		 echo "You can't login twice!";
	 }
 }
 require_once 'includes/footer.php';
?>
