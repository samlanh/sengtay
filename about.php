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
			$idlink=$_GET['id'];
			$stmt=$con->prepare("SELECT * FROM tbl_link_footer WHERE link_footer_id='$idlink' AND trust='1' and status='1'");
			$stmt->execute();
			$rows1=$stmt->fetchAll();
			foreach ($rows1 as $row1){
				?>

				<nav class="category">
					<li class="st_ca"><h6><?php echo $row1['linkFooter'];?> &nbsp<span class="head_spr"></span></h6></li>
					<li class="hr_head">
					<li>
				</nav>
				<?php



				echo '<div class="descriptAbout"><p>'.$row1['descrition'].'</p></div>';
			}

			?>



		</div>
	</div>
<?php
	  include("$tpls/footer_1.php");
	  include("$tpls/fixe_category.php");
	  include("$tpls/footer.php");
?>