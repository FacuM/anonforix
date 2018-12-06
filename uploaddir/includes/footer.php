<?php
 if (isset($render))
 {
   $took = microtime(true) - $time_start;
   echo '
     </main>
     <footer>
      <hr>
      <p>This website is powered by <b>' . $pageinfo[0] . '</b>, the anonymous non-js forum software, it\'s been generated in ' . round($took, 2) . ' seconds and this is the <a href="source.php">source code</a>.</p>
     </footer>
    </font>
   </body>
  </html>
   ';
 }
?>
