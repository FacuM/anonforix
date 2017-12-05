<?php
 include("config.php");
 include($path . "/connect.php");
 include($path . "/session/session.php");
 include($path . "/top.php");
 echo "
 <table width=100% border=1px style='border-color: white;' >";
 // Display threads
 if (isset($_GET['viewforum']) && !isset($_GET['viewthread'])) {
  $result = ($server->query("SELECT * FROM `" . $credentials["ftable"] . "` WHERE `fid` = " . $server->quote($_GET['viewforum'])));
  $count = $result->rowCount();
  $allowance = 0;
  if ($count > 0)
  {
   foreach ($result as $rows)
   {
 	 $allowed = explode(",",$rows['allowed']);
	 $threads = explode(",",$rows['threads']);
	 foreach ($allowed as $data) {
    if ($_SESSION['logged'] == "'$data'") {
      $allowance = $allowance + 1;
      $forumexists = true;
	  }
	}
	if ($allowance > 0) {
	 echo "
     <tr>
      <th width=75% >Threads</th> <th>OP</th>
     </tr>
	 ";
	 foreach ($threads as $data) {
      foreach ($server->query("SELECT * FROM `" . $credentials["ttable"] . "` WHERE `thread` = '$data'") as $trows)
	  {
	   echo "
	   <tr>
	    <td><center><a href='?viewforum=" . $rows['fid'] . "&viewthread=$data&ttitle=" . $trows['title'] . "' >" . $trows['title'] . "</a></center></td> <td><center>". $trows['op'] . "</center>
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
  // Display posts
  if (isset($_GET['viewforum']) && isset($_GET['viewthread'])) {
   $fid = $server->quote($_GET['viewforum']);
   $pid = $server->quote($_GET['viewthread']);
   echo "
   <tr>
    <th width=25% >Thread title</th> <td>"; if (!isset($_GET['ttitle'])) { echo "Untitled thread</td>"; } else { echo $_GET['ttitle'] . "</td>"; }
   echo "</tr>";
  } else {
  // Display forums
  echo "
  <tr>
   <th width=25% >Forum</th> <th>Last post</th>
  </tr>";
  foreach ($server->query("SELECT * FROM " . $credentials["ftable"]) as $rows)
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
	 foreach ($server->query("SELECT * FROM `" . $credentials["ptable"] . "` WHERE `pid` = '" . $rows['lastpid'] . "'") as $prows)
	  { echo $prows['data']; }
	}
	echo "
	</td>
   </tr>";
   }
  }
 }
 echo "
  </table>
 </center>
 ";
 include($path . "/footer.php");
?>
