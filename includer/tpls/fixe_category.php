<div class="fixed_left">
    <nav class="fix_ul">

		
		
		<?php
		include "admin/connection.php";


		if (empty($_GET['id'])){
			$id=26;
		}else{
			$id=$_GET['id'];
		}


			$stmt=$con->prepare("SELECT * FROM tbl_category WHERE tbl_category.trust='1' and menu_id='$id'");
			$stmt->execute();
			$spacial=$stmt->fetchAll();
			foreach ($spacial as $spacailcat){
				?>
				<lo><a title="<?php echo $spacailcat['category']?>" href="<?php echo'#'. $spacailcat['id_category'];?>"><img src="img/logo/<?php echo $spacailcat['icon']?>"style="width: 40px; height: 40px;"></a></lo>
				<?php
			}




		
		?>

		<lo class="fb_book"><a target="_blank" href="https://www.facebook.com/sengtaycomputer"><img src="img/STCcomputer/facebook.png" width="40"></a></lo>
		<lo class="fb_youtube"><a target="_blank" href="https://youtube.com"><img src="img/unnamed.png" width="55"></a></lo>
		<lo class="fb_job"><a href="job_opportunity.php"><img src="img/job.png" width="100%" ></a></lo>
	<!--	<lo class="fb_cunter"><a href="http://s11.flagcounter.com/more/AzM0"><img src="http://s11.flagcounter.com/count2/AzM0/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a><lo/>
-->    </nav>
</div>
