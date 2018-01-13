<?php
 // Login script
 include '../config.php';
 $custh = "<meta http-equiv='refresh' content='" . $redirt . "; url=" . $fullpath . "/index.php'";
 echo "<p>Hey there! Welcome back <b>" . str_replace("'", "", $_SESSION['logged']) . "</b> we're glad to see you around.</p>
 <p>You'll be redirected to the main page in <b>" . $redirt . " seconds</b>.</p>
 </center>";
 include '../footer.php';
?>
