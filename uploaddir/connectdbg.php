<?php
 // From here, don't touch anything, we'll try to get everything up
 require_once 'config.php';
 $err = 2;
 echo "<p><b>Connecting with the MySQL server...</b></p>";
 $server = mysqli_connect($serveraddress, $credentials["username"], $credentials["password"]);
 if (mysqli_error($server) != NULL ) {
	 echo "<p>Something went wrong, please double check your 'config.php'. The following error has beeen thrown: <br><br><i>" . mysqli_error($server) . "<i></p>";
 } else {
	 $err = $err - 1;
	 echo "<p>Success connecting to the MySQL server.</p>";
     if ($err == 1) {
      echo "<p><b>Selecting the requested database (" . $credentials["db"] . ")</b></p>";
      $db = mysqli_select_db($server, $credentials["db"]);
      if (mysqli_error($server) != NULL ) {
 	   echo "<p>Something went wrong, please double check your 'config.php'. <br>The following error has beeen thrown: <br><br><i>" . mysqli_error($server) . "<i></p>";
      } else {
 	   $err = $err - 1;
	   echo "<p>Success handling the selection of the database.</p>";
	  }
	 }
  }
?>
