<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 include("../top.php");
 include("../connect.php");
 include("../processreg.php");
 $query = "INSERT INTO `" . $credentials["db"] . "`.`" . $credentials["utable"] . "` (`username`, `password`, `mail`, `pin`, `utype`) VALUES ('" . $userdata["uusername"] . "', '" . $userdata["upassword"] . "', '" . $userdata["umail"] . "', '" . $userdata["upin"] . "', '5')";
 $loadquery = mysqli_query($server, $query);
 if ( mysqli_error($server) == NULL || mysqli_error($server) == '' ) {
	 echo "
	  <p>Amazing! Looks like everything went as expected. What would you like to do now?</p>
	  <table>
	   <tr>
  	     <td>
		 <form method='post' action='" . $fullpath . "/session/login.php' >
	     <input type='submit' value='Login' >
	     </form>
	     </td>
	    <td>
         <form method='post' action='session/register.php' >
	     <input type='submit' value='Register' >
	     </form>
		</td>
	   </tr>
	 </center>";
 } else {
	 echo "
	  <p>Ah... this is embrassing, but it looks like the database server we were trying to get in touch with isn't responding. This is what happenned: </p>
	  <br><br>
	  <i>" . mysqli_error($server) . "</i>
	 </center>";
 }
?>