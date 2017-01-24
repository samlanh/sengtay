<?php

      $tpls="includer/tpls";
include "admin/connection.php";
      include("$tpls/header.php");
	  include("$tpls/menu.php");
	  include("$tpls/slider.php");
?>

	<div class="about">
		<div class="cat_g">
			<?php
			$idlink=$_GET['linkid'];
			$stmt=$con->prepare("SELECT * FROM tbl_link_footer WHERE link_footer_id='$idlink' AND trust='1' and status='1'");
			$stmt->execute();
			$rows1=$stmt->fetchAll();
			foreach ($rows1 as $row1){

				echo '<h2>'.$row1['linkFooter'].'</h2>';
				echo '<p>'.$row1['descrition'].'</p>';
			}

			?>



		</div>
	</div>
<?php
	  include("$tpls/footer_1.php");
	  include("$tpls/fixe_category.php");
	  include("$tpls/footer.php");
?>