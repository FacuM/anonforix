<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 $debugging = true;
 include 'top.php';
 include 'config.php';
 include 'connect.php';
 echo "
 <center>
 <h4>Step 1 - Registering the first administrator</h4>
  <form method='get' action='install_1-1.php' >
   <table>
    <tr>
	 <td>Username: </td><td><input type='text' name='username' maxlength=25 ></td>
	</tr>
    <tr>
	 <td>Password: </td><td><input type='text' name='password' maxlength=25 ></td>
	</tr>
    <tr>
	 <td>Email address: </td><td><input type='text' name='mail' maxlength=100 ></td>
	</tr>
   </table>
   <br>
   <input type='submit' value='Continue' >
  </form>
 </center>
 ";
 include 'footer.php';
?>