<?php   include "../admin/connection.php";?>

<div class="contaner" >
    <div class="specials">
        <nav class="category">
            <li class="st_ca"><h6>Specials &nbsp<span class="head_spr"></span></h6></li>
            <li class="hr_head">
            <li>
        </nav>

        <div id="specials_u">
            <?php



            $stmt = $con->prepare("SELECT * FROM tbl_article WHERE 	promotion='1' and trust='1' ORDER BY article ASC ");
            $stmt->execute();
            $spacial = $stmt->fetchAll();

            foreach ($spacial as $rowSpacial) {
                ?>

                <div class="tb_row">
                    <img src="img/<?php echo $rowSpacial['images_pro']; ?>" style=" position: absolute;left: 25px;"
                         width="200px" height="150px">
                    <div class="priceShow"><span><del>$<?php echo $rowSpacial['old_price']; ?></del></span>

                        $<?php echo $rowSpacial['new_price']; ?></div>

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

<div class="promotion">
    <div class="specials">
        <nav class="category">
            <li class="st_ca" id="dell_gaming"><h6>Coming soon &nbsp<span class="head_spr"></span></h6></li>
            <li class="hr_head">
            <li>
        </nav>

        <div id="specials_u">
            <?php



            $stmt = $con->prepare("SELECT * FROM tbl_article WHERE arrival_comming='0' and trust='1' ORDER BY article ASC ");
            $stmt->execute();
            $spacial = $stmt->fetchAll();

            foreach ($spacial as $rowSpacial) {
                ?>

                <div class="tb_row">

                    <img src="img/<?php echo $rowSpacial['images_pro']; ?>" style=" position: absolute;left: 25px;"
                         width="200px" height="150px">
                    <span><img src="img/Coming_Soon.png" style="position: absolute;top: 0px; width: 170px;"></span>
                    <div class="tilePro">
                        <h3><?php echo $rowSpacial['article']; ?></h3>
                    </div>


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

$stmt = $con->prepare("SELECT * FROM tbl_category WHERE tbl_category.trust='1' and menu_id='26' ");
$stmt->execute();
$spacial = $stmt->fetchAll();

foreach ($spacial as $rowCat) {
    $cat_id = $rowCat['category_id'];
    ?>

    <div class="promotion">
        <div class="specials">
            <nav class="category">
                <il>
                    <div class="categoryBannerShow1">
                        <img src="img/banner/<?php echo $rowCat['cat_banner'];?>" style="height: 135px;">
                    </div>
                </il>

                <li class="st_ca" id="<?php echo $rowCat['id_category'] ?>"><h6><?php echo $rowCat['category']; ?>
                        &nbsp<span class="head_spr"></span></h6></li>
                <li class="hr_head">
                <li>
            </nav>

            <div id="specials_u">
                <?php


                $stmt = $con->prepare("SELECT * FROM tbl_article WHERE category_id='$cat_id' and trust='1' and promotion='0' and arrival_comming='1'   ORDER BY article ASC ");
                $stmt->execute();
                $spacial = $stmt->fetchAll();
                foreach ($spacial as $rowSpacial) {
                    ?>

                    <div class="tb_row">
                        <img src="img/<?php echo $rowSpacial['images_pro']; ?>"
                             style=" position: absolute;left: 25px;" width="200px" height="150px">
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
?>