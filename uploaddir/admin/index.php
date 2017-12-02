<?php
 include("../config.php");
 include($path . "/connect.php");
 include($path . "/session/session.php");
 include($path . "/top.php");
 $query = "SELECT * FROM `" . $credentials["utable"] . "` WHERE `username` = '" . $_SESSION['login_user'] . "'";
 $result = mysqli_query($server,$query);
 while ($row = mysqli_fetch_array($result)) {
	 $level = $row['utype'];
 }
 if ($level >= 1) {
  echo "
  <h2>Level 1 - User</h2>
  <p>Nothing for now.</p>
  ";
  if ($level > 1) {
   echo"
   <h2>Level 2 - Moderator</h2>
   <p>Nothnig for now.</p>
   ";
   if ($level > 2) {
    echo "
    <h2>Level 3 - Global Moderator</h2>
    <p>Nothing for now.</p>
    ";
    if ($level > 3) {
     echo "
     <h2>Level 4 - Administrator</h2>
     <p>Nothing for now.</p>
     ";
     if ($level > 4) {
      echo "
      <h2>Level 5 - Super Administrator</h2>
	  <p>Nothing for now.</p>
     ";
     }
	}
   }
  }
 }
 echo "</center>";
 include($path . "/footer.php");
?>