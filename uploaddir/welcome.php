<?php
 // Welcome, part of "Login script"
 $render = true; $protected = true; require_once 'includes/wait.php';
 $custh = "<meta http-equiv='refresh' content='" . $redirt . "; url=index.php'>";
 require_once 'includes/head.php';
 echo "<p>Hey there! Welcome back <b>" . str_replace("'", "", $_SESSION['logged']) . "</b> we're glad to see you around.</p>
 <p>You'll be redirected to the main page in <b>" . $redirt . " seconds</b>.</p>
 </center>";
 require_once 'includes/footer.php';
?>
