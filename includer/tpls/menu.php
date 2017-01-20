







<div id="menu">
  <ul>

      <?php
      include "admin/connection.php";

      $stmt=$con->prepare("
      
                SELECT * FROM tbl_menu 
                
      ");
      $stmt->execute();

      $rows=$stmt->fetchAll();



      foreach ($rows as $row){

          ?>
          <li><a  href="Desktops"><?php echo $row['menu']; ?></a></li>
      <?php

      }





      ?>



  </ul>

</div>