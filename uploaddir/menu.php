<?php
 echo "
   <table width=100% >
    <tr>
	 <td><img width=241px height=48px src='" . $fullpath . "/assets/logo.png' alt='Anonforix logo' > </td> <td><p align=right >"; if (isset($_SESSION['logged'])) { echo "<a href='" . $fullpath . "/index.php' >Home</a> | <a href='" . $fullpath . "/admin' >Administration</a> | <a href='" . $fullpath . "/session/logout.php' >Log out</a></p>"; } else { echo "<a href='" . $fullpath . "/session/login.php' >Login</a> | <a href='" . $fullpath . "/session/register.php' >Register</a>"; } echo "</p></td>
	</tr>
   </table>
   <hr>
   <center>";
?>