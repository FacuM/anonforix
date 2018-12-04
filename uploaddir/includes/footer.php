<?php
 $took = microtime(true) - $time_start;
 echo "
   <hr>
   This website is powered by <b>$pageinfo[0]</b>, the anonymous non-js forum software and it's been generated in " . round($took, 2) . " seconds and this is the <a href='source.php' >source code</a>.
   </font>
  </body>
 </html>
 ";
?>
