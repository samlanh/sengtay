<?php

include"init.php";
?>

<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca"><h6>Specials &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 <div id="specials">
	 <?php

	 	include "admin/connection.php";

	 	$stmt=$con->prepare("SELECT * FROM tbl_article WHERE 	promotion='1' and trust='1'");
	 	$stmt->execute();
	 	$spacial=$stmt->fetchAll();

	 foreach ($spacial as $rowSpacial) {
		 ?>

		 <div class="tb_row">
			 <img src="img/<?php echo $rowSpacial['images_pro'];?>" style=" position: absolute;left: 25px;" width="200px"  height="150px">
			 <div class="priceShow"><span><del/>$ <?php echo $rowSpacial['old_price'];?></span> - $<?php echo $rowSpacial['new_price'];?></div>
			 <div class="tilePro">
				 <h3><?php echo $rowSpacial['article'];?></h3>
			 </div>

			 <?php
			 $arrival=$rowSpacial['arrival_comming'];
			 if ($arrival==1){
				echo '<div class="newArrival">
				 <img src="img/STCComputer/newarrival.gif">
			 </div>';
			 }else if ($arrival==0){

				 echo '<div class="newArrival" style="color: red;">
				 New arrival
			 </div>';
			 }

			 ?>
			 <div class="descripshow">
				 <h5>
					 <?php echo $rowSpacial['descrip'];?>
				 </h5>
			 </div>


		 </div>

	 <?php
	 	}
	 ?>



 </div>
</div>
</div>

<div class="promotion">
 <div class="specials">
  <nav class="category">
   <li class="st_ca"><h6>Coming soon &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 <div id="specials">
	 <?php

	 	include "admin/connection.php";

	 	$stmt=$con->prepare("SELECT * FROM tbl_article WHERE arrival_comming='0' and trust='1'");
	 	$stmt->execute();
	 	$spacial=$stmt->fetchAll();

	 foreach ($spacial as $rowSpacial) {
		 ?>

		 <div class="tb_row">
			 <img src="img/<?php echo $rowSpacial['images_pro'];?>" style=" position: absolute;left: 25px;" width="200px"  height="150px">
			 <div class="tilePro">
				 <h3><?php echo $rowSpacial['article'];?></h3>
			 </div>

			 <?php
			 $arrival=$rowSpacial['arrival_comming'];
			 if ($arrival==1){
				echo '<div class="newArrival">
				 <img src="img/STCComputer/newarrival.gif">
			 </div>';
			 }else if ($arrival==0){

				 echo '<div class="newArrival" style="color: red;">
				 New arrival
			 </div>';
			 }

			 ?>
			 <div class="descripshow">
				 <h5>
					 <?php echo $rowSpacial['descrip'];?>
				 </h5>
			 </div>


		 </div>

	 <?php
	 	}
	 ?>



 </div>
</div>
</div>




<div class="promotion">
	<div class="specials">
		<nav class="category">
			<li class="st_ca"><h6>Coming soon &nbsp<span class="head_spr"></span></h6></li>
			<li class="hr_head"><li>
		</nav>

		<div id="specials">
			<?php

			include "admin/connection.php";

			$stmt=$con->prepare("SELECT * FROM tbl_article WHERE arrival_comming='0' and trust='1'");
			$stmt->execute();
			$spacial=$stmt->fetchAll();

			foreach ($spacial as $rowSpacial) {
				?>

				<div class="tb_row">
					<img src="img/<?php echo $rowSpacial['images_pro'];?>" style=" position: absolute;left: 25px;" width="200px"  height="150px">
					<div class="tilePro">
						<h3><?php echo $rowSpacial['article'];?></h3>
					</div>

					<?php
					$arrival=$rowSpacial['arrival_comming'];
					if ($arrival==1){
						echo '<div class="newArrival">
				 <img src="img/STCComputer/newarrival.gif">
			 </div>';
					}else if ($arrival==0){

						echo '<div class="newArrival" style="color: red;">
				 New arrival
			 </div>';
					}

					?>
					<div class="descripshow">
						<h5>
							<?php echo $rowSpacial['descrip'];?>
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
include("$tpls/footer_1.php");
include("$tpls/footer.php");

include("$tpls/fixe_category.php");
 ?>

