<?php
 $render = true; $protected = true; require_once 'includes/head.php';
 // Get the logged in user's level
 $query = "SELECT * FROM " . $credentials["utable"] . " WHERE username = " . $_SESSION['logged'];
 foreach ($server->query($query) as $users) {
  $userlevel = $users['utype'];
 }
 // Skip rest of processing if user isnt a super administrator (lvl 5)
 if ($userlevel < 5) {
  echo "You're not allowed to do anything in this page.";
 } else {
   if (!isset($_POST['fname'])) {
    echo "Invalid request.";
   } else {
    if (isset($_POST['operation'])) {
     if ($_POST['operation'] == 'del') {
      $fquery = "SELECT * FROM `" . $credentials["ftable"] . "` WHERE fid = " . $server->quote($_POST['fname']);
      foreach ($server->query($fquery) as $forums) {
       $tlist = $forums['threads'];
       $tlist = explode(",",$tlist);
       foreach ($tlist as $tid) {
        $tquery = "SELECT * FROM `" . $credentials["ttable"] . "` WHERE thread = " . $server->quote($tid);
        foreach ($server->query($tquery) as $threads) {
         $plist = $threads['posts'];
         $plist = explode(",",$plist);
         foreach ($plist as $pid) {
          $server->query("DELETE FROM `" . $credentials["ptable"] . "` WHERE pid = " . $pid);
         }
        }
       }
       foreach ($tlist as $tid) {
          $server->query("DELETE FROM `" . $credentials["ttable"] . "` WHERE thread = " . $tid);
       }
      }
      $server->query("DELETE FROM `" . $credentials["ftable"] . "` WHERE fid = " . $server->quote($_POST['fname']));
      echo "Delete operation completed.";
     } elseif ($_POST['operation'] == 'add') {
        $forums = $server->query("SELECT * FROM `" . $credentials["ftable"] . "` WHERE fid = " . $server->quote($_POST['fname']));
        $famount = $forums->rowCount();
        if ($famount > 0) {
         echo "You can't add a forum twice!";
        } else {
         $faddq = "INSERT INTO `" . $credentials["ftable"] . "` (`fid`, `desc`, `threads`, `allowed`, `lastpid`) VALUES (" . $server->quote($_POST['fname']) . ",'No description given.','None'," . $_SESSION['logged'] . ",-1)";
         $server->query($faddq);
         echo "The forum " . $_POST['fname'] . " has been successfully added.";
        }
      } else {
         echo "Invalid request.";
      }
    }
   }
 }
 require_once 'includes/footer.php';
?>
