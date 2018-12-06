<?php
 if (isset($render))
 {
    $thread_info = $server->query('SELECT * FROM ' . $credentials['ttable'] . ' WHERE tid = ' . $server->quote($_POST['tid']))->fetch();
    $thread_title = $thread_info['title'];
    $forum_id = $thread_info['fid'];
    if (isset($_POST['content']))
    {
      if (empty($_POST['content']))
      {
        echo '<p>Your post can\'t be empty, please try again.</p>';
      }
      else
      {
        $server->query('INSERT INTO ' . $credentials['ptable'] . ' (pid, tid, op, title, content) VALUES (NULL , ' . $server->quote($_POST['tid']) . ',  ' . $_SESSION['logged'] . ', ' . $server->quote($_POST['title']) . ',  ' . $server->quote($_POST['content']) . ')');
        echo '
        <p>Success!</p>
        <form method="get" action="index.php">
         <p>
          <input type="hidden" name="viewforum" value="' . $forum_id . '">
          <input type="hidden" name="viewthread" value="' . $thread_info['tid'] .'">
          <button class="button" type="submit">Go back to "' . $thread_title . '"</button>
         </p>
        </form>';
      }
    }
    else
    {
     echo '
     <form action="" method=post>
     <table class="data has_columns">
      <thead>
       <th>Title: </th>  <th> <input type="text" name="title" value="" placeholder="Title"> </th>
      </thead>
      <tbody>
       <tr>
        <td>Content: </td>  <td> <textarea cols=130 rows=20 name="content" type="text" maxlength=65535></textarea> </td>
       </tr>
      </tbody>
     </table>
     <table>
      <tr>
       <td>Posting in "' . $thread_title . '"</td>
       <input type="hidden" name="tid" value="' . $_POST['tid'] . '">
      </tr>
     </table>
     <input type="submit" name="submit" value="Done" >
     </form>
    </center>';
    }
 }
?>
