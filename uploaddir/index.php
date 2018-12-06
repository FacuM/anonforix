<?php
 $render = true; $protected = true; require_once 'includes/head.php';
 if (isset($_GET['viewforum']) && isset($_GET['viewthread']))
 {
   require_once 'includes/post_list.php';
 }
 else
 {
   if (isset($_GET['viewforum']) && !isset($_GET['viewthread']))
   {
     require_once 'includes/thread_list.php';
   }
   else
   {
     require_once 'includes/forum_list.php';
   }
 }
 require_once 'includes/footer.php';
?>
