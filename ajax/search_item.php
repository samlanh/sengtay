<?php
include "../admin/connection.php";
if (isset($_POST['valueTextSearch'])) {
    if ($_POST['valueTextSearch']!=""){
    $tile = $_POST['valueTextSearch'];
    $stmt = $con->prepare("SELECT * FROM tbl_article WHERE trust='1' AND article LIKE '%" . $_POST['valueTextSearch'] . "%' ORDER BY article ASC ");
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
}
}