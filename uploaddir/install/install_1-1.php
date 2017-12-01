<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 include("../top.php");
 include("../connect.php");
 if ( ( $_POST['username'] == NULL || $_POST['username'] == '' ) || ( $_POST['password'] == NULL || $_POST['password'] == '' ) || ( $_POST['mail'] == NULL || $_POST['mail'] == '' ) || ( $_POST['pin'] == NULL || $_POST['pin'] == '' ) ) {
	 echo "
	  <p>You must fill all the fields before you continue.</p>
	  <p>Please go back and try again.</p>
	  <form method='post' action='install_1.php' >
 	   <input type='submit' value='Go back' >
	  </form>
	 </center>";
 } else {
  if ( !is_numeric($_POST['pin']) ) { 
   echo "
	  <p>The PIN must be a numeric value.</p>
	  <p>Please go back and try again.</p>
	  <form method='post' action='install_1.php' >
 	   <input type='submit' value='Go back' >
	  </form>
	 </center>";
  } else {
      echo "
 <form method='post' action='install_2.php' >
 <p>Okay... this is what we've got: </p>
 <table>
  <tr>
   <td>Username: </td><td><input type='hidden' name='username' value='" . $_POST['username'] . "' >" . $_POST['username'] . "</td>
  </tr>
  <tr>
   <td>Password: </td><td><input type='hidden' name='password' value='" . $_POST['password'] . "' >" . $_POST['password'] . "</td>
  </tr>
  <tr>
   <td>Email address: </td><td><input type='hidden' name='mail' value='" . $_POST['mail'] . "' >" . $_POST['mail'] . "</td>
  </tr>
  <tr>
   <td>PIN: </td><td><input type='hidden' name='pin' value='" . $_POST['pin'] . "' >" . $_POST['pin'] . "</td>
  </tr>
 </table>
 <p>Is it right?</p>
 <table>
  <tr>
   <td>
    <input type='submit' value='Yes, lets do it!' >
   </td>
    </form>
    <form method='post' action='install_1.php' >
   <td>
    <input type='submit' value='Nope, give me another try.' >
   </td>
  </tr>
 </table>
 </form>
 ";
  }
 }
?>