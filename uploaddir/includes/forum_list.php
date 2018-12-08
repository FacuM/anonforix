<?php
 if (isset($render))
 {
    $forums = $server->query('SELECT * FROM ' . $credentials['ftable']);
    if ($forums->rowCount() > 0)
    {
      $o = '
      <table class="data">
        <thead>
         <th> Forum name </th>  <th> Description </th>  <th> Allowed users </th>
        </thead>
      ';
      foreach ($forums as $forum)
      {
        $permctl_mode = 'table_output'; include 'includes/permctl.php';
        $o .= '
        <tr>
         <td>
          <form method="get">
           <input type="hidden" name="viewforum" value="' . $forum['fid'] . '">
           <input class="index" type="submit" value="' . $forum['name'] . '">
          </form>
         </td>  <td> ' . $forum['description'] . ' </td>  <td> ' . (empty($allowed) ? 'Everyone' : $allowed) . '</td>
        </tr>';
      }
      echo $o . '
      </table>';
    }
    else
    {
      echo '<p>No forums found.</p>';
    }
 }
?>
