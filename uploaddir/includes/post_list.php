<?php
 if (isset($render))
 {
    $thread_title = $server->query('SELECT * FROM ' . $credentials['ttable'] . ' WHERE tid = ' . $server->quote($_GET['viewthread']))->fetch()['title'];
    $o = '
    <table id="thread_info">
     <thead></thead>
     <tbody>
      <tr>
       <td>Currently on "' . $thread_title . '"</td>
      </tr>
     </tbody>
    </table>
    ';
    foreach ($server->query('SELECT * FROM ' . $credentials['ptable'] . ' WHERE tid = ' . $server->quote($_GET['viewthread'])) as $post)
    {
      $o .= '
      <table class="data has_columns">
        <thead>
         <th class="info_column"> Title </th>  <th> Content </th>  <th> OP </th>
        </thead>
        <tr>
         <td class="info_column"> ' . $post['title'] . ' </td>  <td> ' . $post['content'] . ' </td>  <td class="info_column"> ' . $post['op'] . ' </td>
        </tr>
      </table>';
    }
    echo $o . '
    <div class="right">
     <form method="post" action="create.php">
      <input type="hidden" name="tid" value="' . $_GET['viewthread'] . '">
      <button class="button" type="submit">
       <table>
        <tr>
         <td>
          <svg id="i-reply" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
           <path d="M10 6 L3 14 10 22 M3 14 L18 14 C26 14 30 18 30 26" />
          </svg>
         </td>
         <td> Reply </td>
       </tr>
      </table>
     </form>
    </div>
   </div>';
 }
?>
