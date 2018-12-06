<?php
 $protected = true; require_once 'includes/head.php';
 if (isset($_POST['tid']))
 {
   require_once 'includes/create_post.php';
 }
 elseif (isset($_POST['fid']))
 {
   require_once 'includes/create_thread.php';
 }
 else
 {
   echo '<p>Invalid request.</p>';
 }
 require_once 'includes/footer.php';
?>
