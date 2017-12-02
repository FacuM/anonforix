<?php
 include("config.php");
 include($path . "/connect.php");
 include($path . "/session/session.php");
 include($path . "/top.php");
 echo "
 <p>Here, you will see the available forums and subforums (if there were any).</p>
 </center>
 <table width=100% border=1px style='border-color: white;' >
  <tr>
   <th>Forum</th> <th>Last post</th>
  </tr>
 </table>
 ";
?>