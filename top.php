<?php
 echo "
 <html>
  <head>
   <link rel='shortcut icon' href='/favicon.ico' type='image/x-icon' >
   <link rel='icon' href='/favicon.ico' type='image/x-icon' >
   <title>$pageinfo[0] - $pageinfo[1]</title>
   <style>
    @font-face {
     font-family: Ubuntu; 
     src: url(http://" . $_SERVER['HTTP_HOST']. "/anonforix/assets/ubuntu-font-family-0.80/Ubuntu-R.ttf) format('truetype');
	}
	
	a, a:link, a:visited, a:hover, a:active {
	 color: white;
	}
   </style>
  <head>
  <body bgcolor=black text=white ><font face='Ubuntu' >";
  include 'menu.php';
?>