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
     </table>' . ($show_js_status ? '
     <p class="center">Javascript status:
      <span id="js_status">
      <!-- If JS disabled, this will output OFF.-->
      <noscript>disabled.</noscript>
      </span>
     </p>
     <!-- If JS enabled, this will output ON. -->
     <script>document.getElementById("js_status").innerHTML = "enabled.";</script>' : '') . '
    <hr>
    ';
 }
?>
