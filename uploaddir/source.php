<?php
 // Source code explanation and licensing introduction
 include("../config.php");
 include($path . "/top.php");
 include($path . "/connect.php");
 echo "
 <p>The owner of this website must have uploaded an exact copy of the currently running version of this forum software as it's been licensed under <b>GNU AGPLv3</b>. If this isn't the case, try get in touch with the responsible of this site and request it.</p>
 <p>Else, if it's properly set, you should be able to see it right here: <a href='$sourcecode' ></a></p>
 </center>
 ";
 include($path . "/footer.php");
?>
