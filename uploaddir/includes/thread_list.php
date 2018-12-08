<?php
 if (isset($render))
 {
    $threads = $server->query('SELECT * FROM ' . $credentials['ttable'] . ' WHERE fid = ' . $server->quote($_GET['viewforum']));
    $o = '';
    if ($threads->rowCount() > 0)
    {
      $o .= '
      <table class="data">
        <thead>
         <th> Thread title </th>  <th> Creation date </th>  <th> Replies </th>  <th> Last post </th>
        </thead>
      ';
      foreach ($threads as $thread)
      {
        // Set posts amount to zero by default (prevents undefined variable errors), then use a SQL query to count the matching entries. Finally, output the first index.
        $posts_amount = 0; $posts_amount += $server->query('SELECT COUNT(pid) FROM ' . $credentials['ptable'] . ' WHERE tid = ' . $server->quote($thread['tid']))->fetch()[0];
        // If there's at least one post, show it's title for the "Last post" field, else, show "No posts found."
        $last_post = ($posts_amount > 0 ? $server->query('SELECT * FROM ' . $credentials['ptable'] . ' ORDER BY pid DESC LIMIT 1')->fetch()['title'] : 'No posts found.');
        $o .= '
        <tr>
         <td>
          <form class="process" method="get" action="">
           <input type="hidden" name="viewforum" value="' . $thread['fid'] . '">
           <input type="hidden" name="viewthread" value="' . $thread['tid'] . '">
           <input class="index" type="submit" value="' . $thread['title'] . '">
          </form>
         </td>  <td> ' . $thread['date'] . ' </td>  <td> ' . $posts_amount .' </td>  <td> ' . $last_post . ' </td>
        </tr>';
      }
    }
    else
    {
      echo '<p>No threads found.</p>';
    }
    echo $o . '
    </table>
    <div class="right">
     <form method="post" action="create.php">
      <input type="hidden" name="fid" value="' . $_GET['viewforum'] . '">
      <button class="button" type="submit">
       <table>
        <tr>
         <td>
          <svg id="i-plus" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
           <path d="M16 2 L16 30 M2 16 L30 16" />
          </svg>
         </td>
         <td> Create thread </td>
       </tr>
      </table>
     </form>
    </div>
   </div>
    ';
 }
?>
