<?php
 include("config.php");
 include($path . "/connect.php");
 include($path . "/session/session.php");
 include($path . "/top.php");
 echo "
 <table width=100% border=1px style='border-color: white;' >";
 if (isset($_GET['viewforum'])) {
  $fid = mysqli_real_escape_string($server,$_GET['viewforum']);
  $query = "SELECT * FROM `" . $credentials["ftable"] . "` WHERE `fid` = '$fid'";
  $result = mysqli_query($server,$query);
  $count = mysqli_num_rows($result);
  $allowance = 0;
  if ($count > 0)
  {
   while ($rows = mysqli_fetch_assoc($result))
   {
	$allowed = explode(",",$rows['allowed']);
	$threads = explode(",",$rows['threads']);
	foreach ($allowed as $data) {
    if ($_SESSION['logged'] == $data) {
      $allowance = $allowance + 1;
	 }
	}
	if ($allowance > 0) {
	 echo "
     <tr>
      <th width=75% >Threads</th> <th>OP</th>
     </tr>
	 ";
	 foreach ($threads as $data) {
      $tquery = "SELECT * FROM `" . $credentials["ttable"] . "` WHERE `thread` = '$data'";
      $tresult = mysqli_query($server,$tquery);
      while ($trows = mysqli_fetch_assoc($tresult))
	  {
	   echo "
	   <tr>
	    <td><center><a href='?viewforum=$fid&viewthread=$data' >" . $trows['title'] . "</a></center></td> <td><center>". $trows['op'] . "</center>
	   </tr>
	   ";
	  }
	 }
	}
	else {
	 echo "<p>You're not allowed to see this forum.</p>";
   }
   }
  }
  else
  {
   echo "The specified forum does not exist.";
  }
 } else {
  echo "
  <tr>
   <th width=25% >Forum</th> <th>Last post</th>
  </tr>";
  $query = "SELECT * FROM " . $credentials["ftable"];
  $data = mysqli_query($server,$query);
  while ($rows = mysqli_fetch_assoc($data))
  {
   echo "
   <tr>
    <td>
     <table border=1px width=100% height=100% style='border-color: white;' >
     <tr><td><a href='?viewforum=" . $rows['fid'] . "' ><b>" . $rows['fid'] . "</a></b></td></tr>
	 <tr><td>" . $rows['desc'] . "</td></tr>
	 </table>
	</td>
    <td>";
	if ($rows['lastpid'] == 0) {
	  echo "No posts found.";
	} else {
	 $pquery = "SELECT * FROM `" . $credentials["ptable"] . "` WHERE `pid` = '" . $rows['lastpid'] . "'";
	 $pdata = mysqli_query($server,$pquery);
	  while ($prows = mysqli_fetch_assoc($pdata))
	  { echo $prows['data']; }
	}
	echo "
	</td>
   </tr>";
  }
 }
 echo "
  </table>
 </center>
 ";
 include($path . "/footer.php");
?>
