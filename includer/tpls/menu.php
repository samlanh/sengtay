







<div id="menu">
  <ul>

      <?php
      include "admin/connection.php";

      $stmt=$con->prepare("
      
                SELECT * FROM tbl_menu WHERE trust='1' and status='1'
                
      ");
      $stmt->execute();

      $rows=$stmt->fetchAll();



      foreach ($rows as $row){

          ?>
          <li><a  href="index.php?id=<?php echo $row['menu_id']; ?>"><?php echo $row['menu']; ?></a></li>
      <?php

      }





      ?>



  </ul>

</div>