<?php
 if (isset($render))
 {
   require_once 'config.php';
   if (isset($protected)) { require_once 'session.php'; }
   echo "
   <html>
    <head>
     <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' >
     <link rel='icon' href='favicon.ico' type='image/x-icon' >
     <title>$pageinfo[0] - $pageinfo[1]</title>
     <link rel='stylesheet' href='assets/styles/style.css' type='text/css'>
     <style>
      body {
        background-color: " . $theme["background"] . ";
        color: " . $theme["accent"] . ";
      }
     </style>
     "; if (isset($custh)) { echo $custh; }
    echo "</head>
    <body><font face='Ubuntu' >";
    require_once 'menu.php';
    echo '
    <main>';
 }
?>
