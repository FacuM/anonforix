<?php
 if (isset($render))
 {
   echo '
     <table width=100% >
      <tr>
  	   <td> <h1 class="logo"> <a href="index.php">' . $pageinfo[0] .  '</a> </h1> </td>
         <td>
          <p align=right >';
     if (isset($_SESSION['logged']))
     {
       echo '<a href="index.php">Home</a> | <a href="admin.php">Administration</a> | <a href="logout.php">Log out</a> - '. str_replace("'", "", $_SESSION['logged']) . '</p>';
     }
     else
     {
       echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
     }
     echo '
          </p>
         </td>
  	    </tr>
     </table>
    <hr>
    ';
 }
?>
