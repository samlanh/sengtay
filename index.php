<?php

include"init.php";


	if (empty($_GET['id'])){
		
			?>

		
		<div id="show_default">
			
		</div>
	<?php

	}else{
	$meniid=$_GET['id'];
		$stmt = $con->prepare("SELECT * FROM tbl_category WHERE tbl_category.menu_id='$meniid' AND tbl_category.trust='1'");
		$stmt->execute();
		$spacial = $stmt->fetchAll();

		foreach ($spacial as $rowCat) {
			$cat_id = $rowCat['category_id'];
			?>

			<div class="promotion">
				<div class="specials">
					<nav class="category">
						<il>
							<div class="categoryBannerShow1">  <img src="img/banner/<?php echo $rowCat['cat_banner'];?>" style="height: 135px;"> </div>
						</il>
						<li class="st_ca" id="<?php echo $rowCat['id_category'] ?>"><h6><?php echo $rowCat['category']; ?>
								&nbsp<span class="head_spr"></span></h6></li>
						<li class="hr_head">
						<li>
					</nav>

					<div id="specials_u">
						<?php


						$stmt = $con->prepare("SELECT * FROM tbl_article WHERE category_id='$cat_id' AND promotion='0' And arrival_comming='1' and trust='1' ORDER BY article ASC ");
						$stmt->execute();
						$spacial = $stmt->fetchAll();

						foreach ($spacial as $rowSpacial) {
							?>

							<div class="tb_row">
								<img src="img/<?php echo $rowSpacial['images_pro']; ?>"
									 style=" left: 25px; max-width:200px; max-height:150px;margin:0 auto;" >
								<div class="priceShow"> $<?php echo $rowSpacial['new_price']; ?></div>

								<div class="tilePro">
									<h3><?php echo $rowSpacial['article']; ?></h3>
								</div>

								<?php
								$arrival = $rowSpacial['arrival_comming'];
								if ($arrival == 1) {
									echo '<div class="newArrival">
									 <img src="img/STCComputer/newarrival.gif">
								 </div>';
								} else if ($arrival == 0) {

									echo '<div class="newArrival" style="color: red;">
									 New arrival
								 </div>';
								}

								?>
								<div class="descripshow" style="padding-left: 10px;">
									<h5>
										<?php echo $rowSpacial['descrip']; ?>
									</h5>
								</div>


							</div>

							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		}
	}


echo "<div class='ddd' style='width: 1024px;  background-color: #fff;'></div>";

include("$tpls/footer_1.php");
include("$tpls/footer.php");

include("$tpls/fixe_category.php");
 ?>

