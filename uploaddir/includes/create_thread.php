<?php
 if (isset($render))
 {
    $forum_info = $server->query('SELECT * FROM ' . $credentials['ftable'] . ' WHERE fid = ' . $server->quote($_POST['fid']))->fetch();
    $forum_name = $forum_info['name'];
    if (isset($_POST['content']) && isset($_POST['thread_title']) && isset($_POST['post_title']))
    {
      if (empty($_POST['content']))
      {
        echo '<p>Your post can\'t be empty, please try again.</p>';
      }
      else
      {
        if (empty($_POST['thread_title']))
        {
          $server->query('INSERT INTO ' . $credentials['ttable'] . ' (tid, fid, date) VALUES (NULL, ' . $forum_info['fid'] . ', Now())');
        }
        else
        {
          $server->query('INSERT INTO ' . $credentials['ttable'] . ' (tid, fid, title, date) VALUES (NULL, ' . $forum_info['fid'] . ', ' . $server->quote($_POST['thread_title']) . ', Now())');
        }
        $last_thread = $server->query('SELECT * FROM ' . $credentials['ttable'] . ' ORDER BY tid DESC LIMIT 1')->fetch();
        $server->query('INSERT INTO ' . $credentials['ptable'] . ' (pid, tid, op, title, content) VALUES (NULL , ' . $last_thread['tid'] . ',  ' . $_SESSION['logged'] . ', ' . $server->quote($_POST['post_title']) . ',  ' . $server->quote($_POST['content']) . ')');
        echo '
        <p>Success!</p>
        <form method="get" action="index.php">
         <p>
          <input type="hidden" name="viewforum" value="' . $forum_info['fid'] . '">
          <button class="button" type="submit">Go back to "' . $forum_info['name'] . '"</button>
         </p>
        </form>';
      }
    }
    else
    {
     echo '
     <form action="" method=post>
     <table class="data has_columns">
      <thead></thead>
      <tbody>
       <tr>
        <td class="info_column">Thread name: </td>  <td> <input type="text" name="thread_title" value="" placeholder="Thread title"> </td>
       </tr>
       <tr>
        <td class="info_column">Post title: </td>  <td> <input type="text" name="post_title" value="" placeholder="Post title"> </td>
       </tr>
       <tr>
        <td>Content: </td>  <td> <textarea cols=130 rows=20 name="content" type="text" maxlength=65535></textarea> </td>
       </tr>
      </tbody>
     </table>
     <table>
      <tr>
       <td>Creating thread in "' . $forum_name . '"</td>
       <input type="hidden" name="fid" value="' . $_POST['fid'] . '">
      </tr>
     </table>
     <input type="submit" name="submit" value="Done" >
     </form>
    </center>';
    }
 }
?>
