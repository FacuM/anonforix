<?php
 if (isset($render))
 {
   switch ($permctl_mode)
   {
     case 'render':
        if (isset($_GET['viewforum']))
        {
          // If logged user is allowed to use this forum, set $allowed to true.
          $allowed = false; $atable = $server->query('SELECT * FROM ' . $credentials['atable'] . ' WHERE fid = ' . $server->quote($_GET['viewforum']));
          if ($atable->rowCount() > 0)
          {
            foreach ($atable as $allow)
            {
              if ($allow['fid'] == $_GET['viewforum'] && $allow['username'] == $_SESSION['logged'])
              {
                $allowed = true;
              }
            }
          }
          else
          {
            $allowed = true;
          }
        }
        /*

         TODO: REWORK THIS CASE! Actually, this is a super resources-expensive
         solution that "just works".

        */
        if (isset($allowed) && !$allowed)
        {
          echo '<p>You are not allowed to view this forum.</p>';
        }
      break;
     case 'table_output':
       $curpos = 0; $allowed = ''; $atable = $server->query('SELECT username FROM ' . $credentials['atable'] . ' WHERE fid = ' . $server->quote($forum['fid']));
       foreach ($atable as $allow)
       {
         $curpos++;
         $allowed .= ($atable->rowCount() > $curpos ? $allow['username'] . ' - ' : $allow['username']);
       }
      break;
     default:
       // We should never be here.
      break;
   }
 }
?>
