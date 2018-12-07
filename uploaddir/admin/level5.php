<?php
 if (isset($render))
 {
    echo "
    <h2>Level 5 - Super Administrator</h2>
    <p>Forums management - Creation and deletion</p>
    <table>
     <tr>
      <td>
        <form action='do.php' method='post'>
           <table class='has_columns sm'>
            <tr>
              <td>
               <select name='fname' size=1 >
          ";
               foreach ($server->query("SELECT * FROM " . $credentials['ftable']) as $forums) {
                  echo "<option value='" . $forums['fid'] . "' >" . $forums['fid'] . "</option>";
               }
         echo "
               </select>
              </td>
            </tr>
            <tr>
             <td> <input type='submit' name='submit' value='Delete'>
                  <input type='hidden' name='operation' value='del'> </td>
            </tr>
           </table>
        </form>
      </td>
     </tr>
     <tr>
      <td>
       <form action='do.php' method='post'>
         <table>
          <tr>
           <td>
             <input type='text' name='fname' placeholder='New forum name...'>
           </td>
          </tr>
          <tr>
           <td>
             <input type='text' name='fdesc' placeholder='New forum description...'>
           </td>
          </tr>
          <tr>
           <td> <input type='submit' name='submit' value='Add'>
                <input type='hidden' name='operation' value='add'> </td>
          </tr>
         </table>
       </form>
      </td>
     </tr>
    </table>
    ";
 }
?>
