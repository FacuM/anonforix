<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation');
 $debugging = true;
 include 'top.php';
 include 'config.php';
 include 'connect.php';
 echo "<center>
 <form method='post' action='install_2.php' >
 <p>Okay... this is what we've got: </p>
 <table>
  <tr>
   <td>Username: </td><td>" . $_GET['username'] . "</td>
  </tr>
  <tr>
   <td>Password: </td><td>" . $_GET['password'] . "</td>
  </tr>
  <tr>
   <td>Email address: </td><td>" . $_GET['mail'] . "</td>
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
 "
?>