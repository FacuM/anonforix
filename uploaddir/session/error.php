<?php
 // Login error script
 include("../config.php");
 include($path . "/top.php");
 include($path . "/connect.php");
 echo "
 <p>Unable to log in: no match for username/password combination.</p>
 </center>
 ";
 include($path . "/footer.php");
?>