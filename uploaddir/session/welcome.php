<?php
 // Login script
 include '../connect.php';
 include 'session.php';
 $custh = "<meta http-equiv='refresh' content='5; url=" . $fullpath . "/index.php'";
 include '../top.php';
 echo "<p>Hey there! Welcome back <b>" . $_SESSION['login_user'] . "</b> we're glad to see you around.</p>
 <p>You'll be redirected to the main page in <b>5 seconds</b>.</p>
 </center>";
 include '../footer.php';
?>