<?php
 include("session/session.php");
 echo "
   <table width=100% >
    <tr>
	 <td><img width=241px height=48px src='" . $fullpath . "/assets/logo.png' alt='Anonforix logo' > </td> <td><p align=right >"; if (isset($_SESSION['login_user'])) { echo "<a href='index.php' >Home</a> | <a href='logout.php' >Log out</a></p>"; } else { echo "<a href='" . $fullpath . "/session/login.php' >Login</a>"; } echo "</p></td>
	</tr>
   </table>
   <hr>
   <center>";
?>