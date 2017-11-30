<?php
 // From here, don't touch anything, we'll try to get everything up
 $err = 4;
 echo "<p><b>Connecting with the MySQL server...</b></p>";
 $server = mysqli_connect($serveraddress, $credentials["username"], $credentials["password"]);
 if (mysqli_error($server) != NULL ) {
	 echo "<p>Something went wrong, please double check your 'config.php'. The following error has beeen thrown: <br><br><i>" . mysqli_error($server) . "<i></p>";
 } else {
	 $err = $err - 1;
	 echo "<p>Success connecting to the MySQL server.</p>";
     if ($err == 3) {
      echo "<p><b>Selecting the requested database (" . $credentials["db"] . ")</b></p>";
      $db = mysqli_select_db($server, $credentials["db"]);
      if (mysqli_error($server) != NULL ) {
 	   echo "<p>Something went wrong, please double check your 'config.php'. <br>The following error has beeen thrown: <br><br><i>" . mysqli_error($server) . "<i></p>";
      } else {
 	   $err = $err - 1;
	   echo "<p>Success handling the selection of the database.</p>";
	   if ($err == 2) {
       echo "<p><b>Checking if the requested users table (" . $credentials["utable"] . ") exists</b></p>";
       $table = mysqli_query($server, "SELECT 1 FROM " . $credentials["utable"] . " LIMIT 1");
       if (mysqli_error($server) != NULL ) {
	    echo "<p>Hey! Looks like the users table hasn't been created yet. Please take a look at your 'config.php'.</p>";
       } else {
	    $err = $err - 1;
	    echo "<p>Okay, I've checked that there <b>is</b> a table called " . $credentials["utable"]. " there";
	    if ($err = 1) {
         echo "<p><b>Checking if the requested administratos table (" . $credentials["atable"] . ") exists</b></p>";
         $table = mysqli_query($server, "SELECT 1 FROM " . $credentials["atable"] . " LIMIT 1");
         if (mysqli_error($server) != NULL ) {
	      echo "<p>Hey! Looks like the administrators table hasn't been created yet. Please take a look at your 'config.php'.</p>";
         } else {
	      $err = $err - 1;
	      echo "<p>Okay, I've checked that there <b>is</b> a table called " . $credentials["atable"]. " there";
		 }
		}
	   }
	 }
   }
  }
 }
?>