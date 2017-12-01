<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 $debugging = true;
 include '../config.php';
 include '../top.php';
 echo "
 <center>
  <h3>Welcome to the <b>Anonforix</b> installation wizard!</h3>
  <h4>Step 0 - Introduction and configuration diagnostics</h4>
 </center>
 <p>This little piece of code will get you through the set up of the software on your dedicated server. This should take less than five minutes.</p>
 <p>Before you begin, please make sure that you've already modified your <b>config.php</b> file with your credentials and it isn't writable neither readable by anyone else than the server itself.</b>
 <p>Below, you're about to be presented with the database connection testing step in debugging mode.</p>
 <p>We're gonna try to get online with these credentials: </p>
 <center>
  <table>
   <tr>
    <td>Hostname: </td> <td>" . $credentials["hostname"] . "</td>
   </tr>
   <tr>
    <td>Port: </td> <td>" . $credentials["port"] . "</td>
   </tr>
   <tr>
    <td>Username: </td> <td>" . $credentials["username"] . "</td>
   </tr>
   <tr>
    <td>Password: </td> <td>"; if ($credentials["password"] != '' ) { echo $credentials["password"]; } else { echo "<i>(none)</i>"; }; echo "</td>
   </tr>
   <tr>
    <td>Database: </td> <td>" . $credentials["db"] . "</td>
   </tr>
   <tr>
    <td>Users table: </td> <td>" . $credentials["utable"] . "</td>
   </tr>
  </table>
 </center>
 <hr>
 <center>";
 include '../connectdbg.php';
 echo "</center>";
 if ($err != 0) {
	 echo "<p><b>Status: <span style='color: red' >Not passed!</span></b> Please correct the errors shown above and try again.</p>"; 
 } else {
	 echo "<p><b>Status: <span style='color: green' >Passed!</span></b> Hey! Looks like we're gonna be friends. You can now continue with the installation.</p>
	 <form method='post' action='install_1.php' width=100% align=right >
	  <input type='submit' value='Continue' >
	 </form>";
 }
 include '../footer.php';
?>