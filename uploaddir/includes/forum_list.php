<?php
 if (isset($render))
 {
    $o = '
    <table class="data">
      <thead>
       <th> Forum name </th>  <th> Description </th>  <th> Allowed users </th>
      </thead>
    ';
    foreach ($server->query('SELECT * FROM ' . $credentials['ftable']) as $forum)
    {
      $allowed = '';
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
?>
