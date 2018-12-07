<?php
 $render = true; $protected = true; require_once 'includes/head.php';
 $result = $server->query("SELECT * FROM `" . $credentials["utable"] . "` WHERE `username` = " . $_SESSION['logged']);
 foreach ($result as $row) {
	 $level = $row['utype'];
 }
 echo '
 <div class="center">';
 if ($level >= 1) {
  echo "
  <h2>Level 1 - User</h2>
  <p>Nothing for now.</p>
  ";
  if ($level > 1) {
   echo"
   <h2>Level 2 - Moderator</h2>
   <p>Nothing for now.</p>
   ";
   if ($level > 2) {
    echo "
    <h2>Level 3 - Global Moderator</h2>
    <p>Nothing for now.</p>
    ";
    if ($level > 3) {
      require_once 'admin/level4.php';
     if ($level > 4) {
       require_once 'admin/level5.php';
    }
   }
  }
 }
 }
 echo '
 </div>';
 require_once 'includes/footer.php';
?>
