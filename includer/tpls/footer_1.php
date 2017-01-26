<div style="color:#fff">.</div>
<div class="footer">
	<div style="text-align: center;" class="con_fo">

		<?php
		include "admin/connection.php";
		$stmt=$con->prepare("SELECT * FROM tbl_footer_cat WHERE trust='1' and status='1'");
		$stmt->execute();
		$rows=$stmt->fetchAll();
		$rowCount=$stmt->rowCount();

		foreach ($rows as $row){

			 $idcatfooter=$row['footer_cat_id'];

			?>
					<div class="Information" style="width:<?php echo 100/$rowCount.'%';?> ">
						<h2><b/><?php echo $row['footer_title']; ?></h2>

						<?php
						$stmt=$con->prepare("SELECT * FROM tbl_link_footer WHERE footer_cat_id='$idcatfooter' AND trust='1' and status='1'");
						$stmt->execute();
						$rows1=$stmt->fetchAll();
						foreach ($rows1 as $row1){

						echo '<a href="about.php?id='.$row1['link_footer_id'].'"><h5>'.$row1['linkFooter'].'</h5></a>';
						}

						?>





					</div>
			<?php
		}

		?>

		<!--<div class="Information">
			<h2><b/>Information</h2>
			<a href="about.php"><h5 style="margin-left:-26px">About Us</h5></a>
			<a href="job_opportunity.php"><h5 style="margin-left:4px">Job Opportunity</h5></a>
			<a href=""><h5 style="margin-left:26px">Terms & Conditions</h5></a>
		</div>
		<div class="Information">
			<h2><b/>Customer Service</h2>
			<a href="contact.php"><h5 style="margin-left:-60px">Contact Us</h5></a>
			<a href=""><h5 style="margin-left:-73px">Site Map</h5></a>
		</div>
		<div class="Information">
			<h2><b/>Extras</h2>
			<a href=""><h5>Brands</h5></a>
			<a href="Specials_offers.php"><h5>Specials</h5></a>
		</div>-->


	</div>
	<div class="copy_write">
		<hr style="width:400px; background:#ddd;">
		<h6>Powered By STC Computer @CAM-APP </h6>
	</div>
  </div>
<div class="marquee_h"><MARQUEE direction="left" scrollamount=5 onmouseout="javascript:this.start()" onmouseover="javascript:this.stop()" scrollamount="2" ><h5>
				<?php
				include "admin/connection.php";
				$stmt=$con->prepare("SELECT * From tbl_runtext WHERE status='1' ORDER BY 	orderList ASC ");
				$stmt->execute();
				$result=$stmt->fetchAll();
				foreach ($result as $row){
					echo'<div class="margueetext">'. $row['Description'].'</div>';
				}

				?>

			
<h5></MARQUEE>
</div>