<?php
 // Installation script for Anonforix
 $pageinfo = array ('Anonforix', 'Installation'); $render = true; require_once 'includes/head.php';
 if (isset($_POST['part']))
 {
   switch ($_POST['part']) {
     case '1':
         echo "
         <h4>Step 1 - Registering the first administrator</h4>
          <form method='post' action=''>
           <input type='hidden' name='part' value='1-1'>
           <table>
            <tr>
        	 <td>Username: </td><td><input type='text' name='username' maxlength=25 ></td>
        	</tr>
            <tr>
        	 <td>Password: </td><td><input type='text' name='password' maxlength=25 ></td>
        	</tr>
            <tr>
        	 <td>Email address: </td><td><input type='text' name='mail' maxlength=100 ></td>
        	</tr>
            <tr>
        	 <td>PIN: </td><td><input type='numeric' name='pin' maxlength=6 ></td>
        	</tr>
           </table>
           <br>
           <input type='submit' value='Continue' >
          </form>
         </center>
         ";
       break;
     case '1-1':
         if ( ( $_POST['username'] == NULL || $_POST['username'] == '' ) || ( $_POST['password'] == NULL || $_POST['password'] == '' ) || ( $_POST['mail'] == NULL || $_POST['mail'] == '' ) || ( $_POST['pin'] == NULL || $_POST['pin'] == '' ) ) {
          echo "
           <p>You must fill all the fields before you continue.</p>
           <p>Please go back and try again.</p>
           <form method='post' action='' >
              <input type='hidden' name='part' value='1'>
              <input type='submit' value='Go back' >
           </form>
          </center>";
         } else {
          if ( !is_numeric($_POST['pin']) ) {
           echo "
           <p>The PIN must be a numeric value.</p>
           <p>Please go back and try again.</p>
           <form method='post' action='' >
              <input type='hidden' name='part' value='1'>
              <input type='submit' value='Go back' >
           </form>
          </center>";
          } else {
           echo "
           <form method='post' action='' >
           <input type='hidden' name='part' value='2'>
           <p>Okay... this is what we've got: </p>
           <table>
            <tr>
             <td>Username: </td><td><input type='hidden' name='username' value='" . $_POST['username'] . "' >" . $_POST['username'] . "</td>
            </tr>
            <tr>
             <td>Password: </td><td><input type='hidden' name='password' value='" . $_POST['password'] . "' >" . $_POST['password'] . "</td>
            </tr>
            <tr>
             <td>Email address: </td><td><input type='hidden' name='mail' value='" . $_POST['mail'] . "' >" . $_POST['mail'] . "</td>
            </tr>
            <tr>
             <td>PIN: </td><td><input type='hidden' name='pin' value='" . $_POST['pin'] . "' >" . $_POST['pin'] . "</td>
            </tr>
           </table>
           <p>Is it right?</p>
           <table>
            <tr>
             <td>
              <input type='submit' value='Yes, lets do it!' >
             </td>
              </form>
              <form method='post' action='' >
             <td>
              <input type='hidden' name='part' value='1'>
              <input type='submit' value='Nope, give me another try.' >
             </td>
            </tr>
           </table>
           </form>
           ";
            }
           }
       break;
     case '2':
         $userlevel = 5; $frominstall = true;
         require_once 'register.php';
         if (isset($server->error)) {
           echo "
            <p>Ah... this is embrassing, but it looks like the database server we were trying to get in touch with isn't responding. This is what happenned: </p>
            <br><br>
            <i>" . $server->error . "</i>
           </center>";
         } else {
           echo "
             <p>Amazing! Looks like everything went as expected. What would you like to do now?</p>
             <table>
              <tr>
                  <td>
              <form method='post' action='login.php' >
                <input type='submit' value='Login' >
                </form>
                </td>
               <td>
                   <form method='post' action='register.php' >
                <input type='submit' value='Register' >
                </form>
             </td>
              </tr>
            </center>";
           }
       break;
     default:
       echo 'Unexpected case found, aborting...';
       break;
   }
 }
 else
 {
       echo "
        <h3>Welcome to the <b>Anonforix</b> installation wizard!</h3>
        <h4>Step 0 - Introduction and configuration diagnostics</h4>
       </center>
       <p>This little piece of code will get you through the set up of the software on your dedicated server. This should take less than five minutes.</p>
       <p>Before you begin, please make sure that you've already modified your <b>config.php</b> file with your credentials and it isn't writable neither readable by anyone else than the server itself.</b>
       <p>Below, you're about to be presented with the database connection testing step in debugging mode.</p>
       <p>We're gonna try to get online with these credentials: </p>
       <center>
        <table>
         <tr>
          <td>Hostname: </td> <td>" . $credentials["hostname"] . "</td>
         </tr>
         <tr>
          <td>Port: </td> <td>" . $credentials["port"] . "</td>
         </tr>
         <tr>
          <td>Username: </td> <td>" . $credentials["username"] . "</td>
         </tr>
         <tr>
          <td>Password: </td> <td>"; if ($credentials["password"] != '' ) { echo $credentials["password"]; } else { echo "<i>(none)</i>"; }; echo "</td>
         </tr>
         <tr>
          <td>Database: </td> <td>" . $credentials["db"] . "</td>
         </tr>
         <tr>
          <td>Users table: </td> <td>" . $credentials["utable"] . "</td>
         </tr>
        </table>
       </center>
       <hr>
       <center>";
       require_once 'connectdbg.php';
       echo "</center>";
       if ($err != 0) {
        echo "<p><b>Status: <span style='color: red' >Not passed!</span></b> Please correct the errors shown above and try again.</p>";
       } else {
        echo "<p><b>Status: <span style='color: green' >Passed!</span></b> Hey! Looks like we're gonna be friends. You can now continue with the installation.</p>";
        mysqli_query($server, "TRUNCATE " . $credentials["utable"]);
        if ( mysqli_error($server) != NULL ) {
         echo "<p><span style='color: orange' ><b>Warning: </b></span> Something went wrong while trying to truncate the '" . $credentails["db"] . "' table, the result of continuing are unpredictable and could lead to a big security breach.<br><br><p><i>" . mysqli_error($server) . "</i></p>";
        } else {
            echo "<p><span style='color: yellow' ><b>Notice: </b></span> The table '" . $credentials["utable"] . "' has been successfully truncated.";
        }
        echo '<form method="post" action="" width="100%" align="right" >
          <input type="hidden" name="part" value="1">
         <input type="submit" value="Continue" >
        </form>';
       }
 }
 require_once 'includes/footer.php';
?>
