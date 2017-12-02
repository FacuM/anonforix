<?php
 echo "
 <html>
  <head>
   <link rel='shortcut icon' href='" . $fullpath . "/favicon.ico' type='image/x-icon' >
   <link rel='icon' href='" . $fullpath . "/favicon.ico' type='image/x-icon' >
   <title>$pageinfo[0] - $pageinfo[1]</title>
   <style>
    @font-face {
     font-family: Ubuntu; 
     src: url(" . $fullpath . "/anonforix/assets/ubuntu-font-family-0.80/Ubuntu-R.ttf) format('truetype');
	}
	
	a, a:link, a:visited, a:hover, a:active {
	 color: white;
	}
   </style>"; if (isset($custh)) { echo $custh; }
  echo "</head>
  <body bgcolor=" . $theme["background"] . " text=" . $theme["accent"] . " ><font face='Ubuntu' >";
  include("menu.php");
?>