<?php
 if (isset($render))
 {
   $o = '
   <h2>Level 4 - Administrator</h2
   <p>Forums management - Permission control</p>';

   // If a request is made, process it.

   //////////////////////////////////////////////////
   if (isset($_POST['permctl_fid']) && isset($_POST['permctl_username']) && isset($_POST['permctl_op']))
   {
       // Initialize the paragraph.
       $o .= '<p>';
       // Count matching users (check if user exists).
       if ($server->query('SELECT username FROM ' . $credentials['utable'] . ' WHERE username = ' . $server->quote($_POST['permctl_username']))->rowCount() > 0)
       {
           // Count matching users (check if user is already present).
           if ($server->query('SELECT username FROM ' . $credentials['atable'] . ' WHERE username = ' . $server->quote($_POST['permctl_username']))->rowCount() > 0)
           {
             switch ($_POST['permctl_op']) {
               case 'add':
                  echo 'You can\'t add a user twice.';
                 break;
               case 'remove':
                  $server->query('DELETE FROM ' . $credentials['atable'] . ' WHERE username = ' . $server->quote($_POST['permctl_username']));
                  echo 'Success deleting ' . $_POST['permctl_username'] . ' from allowed list.';
                 break;
               default:
                  echo 'Invalid request.';
                 break;
             }
           }
           else
           {
             switch ($_POST['permctl_op']) {
               case 'add':
                  $server->query('INSERT INTO ' . $credentials['atable'] . ' (fid, username) VALUES (' . $server->quote($_POST['permctl_fid']) . ', ' . $server->quote($_POST['permctl_username']) . ')');
                  echo 'Success adding ' . $_POST['permctl_username'] . ' to allowed list.';
                 break;
               case 'remove':
                  echo 'You can\'t remove a user that\'s not present.';
                 break;
               default:
                  echo 'Invalid request.';
                 break;
             }
           }
       }
       else
       {
         echo 'No such user.';
       }
       $o .= '</p>';
   }
   //////////////////////////////////////////////////

   $o = '
   <form class="process" method="post" action="">
    <table>
     <tr>
      <td>
       <select name="permctl_fid">';
         $forums = $server->query('SELECT fid, name FROM ' . $credentials['ftable']);
         if ($forums->rowCount() > 0)
         {
           foreach ($forums as $forum)
           {
             $o .= '<option value="' . $forum['fid'] . '">' . $forum['name'] . '</option>';
           }
         }
         else
         {
           $o .= '<option value="">No forum found.</option>';
         }
   echo $o . '
       </select>
      </td>
     </tr>
     <tr>
      <td> <input type="text" name="permctl_username" placeholder="Username" value=""> </td>
     </tr>
     <tr>
      <td> <input type="radio" name="permctl_op" value="add" checked> Add </td>
     </tr>
     <tr>
      <td> <input type="radio" name="permctl_op" value="remove"> Remove </td>
     </tr>
     <tr>
      <td> <input type="submit" value="Done"> </td>
     </tr>
    </table>
   </form>';
 }
?>
