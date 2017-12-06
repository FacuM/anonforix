<?php
 $time_end = microtime_float();
 $took = $time_end - $time_start;
 echo "
   <hr>
   This website is powered by <b>$pageinfo[0]</b>, the anonymous non-js forum software and it's been generated in " . substr($took, 0, 7) . " seconds.
   </font>
  </body>
 </html>
 ";
?>
