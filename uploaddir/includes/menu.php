<?php
 if (isset($render))
 {
   echo "
     <table width=100% >
      <tr >
  	   <td ><a href='index.php' >
        <img width=241px height=48px src='assets/logo.png' alt='Anonforix logo' ></a> </td>
         <td>
          <p align=right >";
     if (isset($_SESSION['logged']))
     {
       echo "<a href='index.php' >Home</a> | <a href='admin.php'>Administration</a> | <a href='logout.php' >Log out</a> - ". str_replace("'", "", $_SESSION['logged']) . "</p>";
     }
     else
     {
       echo "<a href='login.php' >Login</a> | <a href='register.php' >Register</a>";
     }
     echo "
          </p>
         </td>
  	    </tr>
     </table>
    <hr>
    ";
 }
?>
