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
     echo "
     <h2>Level 4 - Administrator</h2>
     <p>Nothing for now.</p>
     ";
     if ($level > 4) {
      echo "
      <h2>Level 5 - Super Administrator</h2>
      <p>Forums management - Creation and deletion</p>
       <table >
        <tr>
	<form action='do.php' method='post' >
         <td>
	  <select name='fname' size=1 >
      ";
     foreach ($server->query("SELECT * FROM " . $credentials['ftable']) as $forums) {
       echo "<option value='" . $forums['fid'] . "' >" . $forums['fid'] . "</option>";
     }
     echo "
          </select>
	</td>
	<td>
	 <input type='submit' name='submit' value='Delete' >
	 <input type='hidden' name='operation' value='del' >
	</td>
       </form>
       </tr>
       <tr>
       <form action='do.php' method='post' >
        <td><input type='text' name='fname' placeholder='New forum name...'></td>
        <td><input type='text' name='fdesc' placeholder='New forum description...'></td>
       </tr>
       <tr>
      </tr>
     </table>
     <input type='submit' name='submit' value='Add'>
     <input type='hidden' name='operation' value='add' >
       </form>
    ";
    }
   }
  }
 }
 }
 echo '
 </div>';
 require_once 'includes/footer.php';
?>
