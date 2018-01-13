<?php
 include("config.php");
 if (!isset($_POST['data'])) {
  if (isset($_GET['tid'])) { $tid = $_GET['tid']; }
  echo "
  <form action='" . $fullpath . "/create.php' method=post >
  <table width=100% border=1px style='border-color: white' >
   <tr>
    <th>Post: </th>
   </tr>
   <tr>
    <td ><textarea cols=130 rows=20 name='data' type='text' maxlength=65535 ></textarea></td>
   </tr>
   <tr>
  </table>
  <table >
   <tr>
    <td>Thread ID: </td>"; if (isset($tid)) { echo "<td><p>#$tid</p></td>"; } else { echo "<td><input type='text' name='tid' placeholder='Type a forum's name' >"; }
   echo "<input type='hidden' name='tidsec' value='" . $_GET['tid'] . "' >
   </tr>
  </table>
  <input type='hidden' name='fid' value='" . $_GET['fid'] . "' >
  <input type='submit' name='submit' value='Done' >
  </form>
 </center>";
 } else {
  if (!isset($tid)) {
   if (isset($_POST['tidsec'])) {
    $tid = $_POST['tidsec'];
   }
  }
  if (isset($tid)) {
   $rndn = rand();
   $block = $server->query("SELECT * FROM `" . $credentials["ptable"] . "` WHERE `pid` = '" . $rndn . "'");
   $count = $block->rowCount();
   if ($count > 0) {
    while ($count > 0) {
     $rndn = rand();
     $block = $server->query("SELECT * FROM `" . $credentials["ptable"] . "` WHERE `pid` = '" . $rndn . "'");
     $count = $block->rowCount();
    }
   }
   foreach ($server->query("SELECT * FROM `" . $credentials["ttable"] . "` WHERE `thread` = '" . $tid . "'") as $rows) {
     $pquery = "INSERT INTO `" . $credentials["ptable"] . "` (`pid`, `data`, `tid`) VALUES ('" . $rndn . "', " . $server->quote($_POST['data']) . ", '$tid')";
     $server->query($pquery);
    }
   if (isset($_POST['fid'])) {
    header("location: " . $fullpath . "/index.php?viewforum=$fid&viewthread=$tid");
   } else {
	header("location: " . $fullpath . "/index.php");
   }
  }
 }
 include($path . "/footer.php");
?>
