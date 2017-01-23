<?php

include"init.php";
?>

<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca"><h6>Specials &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">


   <?php
   include "admin/connection.php";
   $stmt=$con->prepare("SELECT * FROM tbl_article");
   $stmt->execute();
   $rowSpacial= $stmt->fetchAll();
   $rowcount=$stmt->rowCount();
   $test= $rowcount/4;
  echo $test=ceil($test);

   for ($t=0;$t<$test;$t++){

   echo "<tr>";
   foreach ($rowSpacial as $rowSpac){



    ?>


      <td class="col_st">
       <!-- <span class="upcoming"></span>--><img src="img/<?php echo $rowSpac['images_pro']?>" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center"><?php echo $rowSpac['article']?></h4>
       <h3 style="text-align:center; color:red"><?php echo $rowSpac['new_price']?>$</h3>
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>






    <?php

   }
   echo "</tr>";
   }
   ?>


  </table>
 </div>
</div>


<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca"><h6>Coming Soon &nbsp &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">
   <?php for ($i=0; $i <4; $i++) {
    ?>
    <tr>
     <?php for ($j=0; $j <4; $j++) {

      ?>
      <td class="col_st">
       <span class="upcoming"></span><img src="img/comingLap.jpg" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center">Dell Inspiron 7559</h4>
      <!-- <h3 style="text-align:center; color:red"><span class="price"><del>$1,100</span>&nbsp&nbsp$1,240 </h3>-->
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>

     <?php }?>
    </tr>
   <?php }?>
  </table>
 </div>
</div>


<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca" id="dell_gaming"><h6>Dell &nbsp &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">
   <?php for ($i=0; $i <4; $i++) {
    ?>
    <tr>
     <?php for ($j=0; $j <4; $j++) {

      ?>
      <td class="col_st">
      <!-- <span class="upcoming"></span>--><img src="img/dell.jpg" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center">Dell Inspiron 7559</h4>
        <h3 style="text-align:center; color:red">$1,240 </h3>
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>

     <?php }?>
    </tr>
   <?php }?>
  </table>
 </div>
</div>

<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca" id="dell_gaming"><h6>Asus &nbsp &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">
   <?php for ($i=0; $i <4; $i++) {
    ?>
    <tr>
     <?php for ($j=0; $j <4; $j++) {

      ?>
      <td class="col_st">
       <!-- <span class="upcoming"></span>--><img src="img/asus.jpg" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center">Dell Inspiron 7559</h4>
       <h3 style="text-align:center; color:red">$1,240 </h3>
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>

     <?php }?>
    </tr>
   <?php }?>
  </table>
 </div>
</div>

<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca" id="dell_gaming"><h6>Acer &nbsp &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">
   <?php for ($i=0; $i <4; $i++) {
    ?>
    <tr>
     <?php for ($j=0; $j <4; $j++) {

      ?>
      <td class="col_st">
       <!-- <span class="upcoming"></span>--><img src="img/acer.jpg" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center">Dell Inspiron 7559</h4>
       <h3 style="text-align:center; color:red">$1,240 </h3>
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>

     <?php }?>
    </tr>
   <?php }?>
  </table>
 </div>
</div>
<div class="contaner">
 <div class="specials">
  <nav class="category">
   <li class="st_ca" id="dell_gaming"><h6>Lenovo &nbsp &nbsp<span class="head_spr"></span></h6></li>
   <li class="hr_head"><li>
  </nav>

 </div>
 <div id="specials">
  <table width="100%" border="1">
   <?php for ($i=0; $i <4; $i++) {
    ?>
    <tr>
     <?php for ($j=0; $j <4; $j++) {

      ?>
      <td class="col_st">
       <!-- <span class="upcoming"></span>--><img src="img/lenovo.png" width="250" height="200" style="padding:20px">
       <h4 style="text-align:center">Dell Inspiron 7559</h4>
       <h3 style="text-align:center; color:red">$1,240 </h3>
       <h5><img src="img/STC Computer/newarrival.gif"></h5>
       <h5>- CPU: Corei7-6700HQ 2.6Ghz Max 3.5GHz</h5>
       <h5>- RAM: 8GB DDR3L</h5>
       <h5>- HDD :  1,000GB</h5>
       <h5>- Optical Drive: NO</h5>
       <h5>- VGA 1: Intel HD Graphics 530</h5>
       <h5>- VGA 2: NVIDIA GTX 960M 4GB</h5>
       <h5>- Webcam/ Wireless/ LAN</h5>
       <h5>- Bluetooth/ SD/ USB3.0/ HDMI</h5>
       <h5>- Display : 15.6" FHD (1920 x 1080)</h5>
       <h5>- Windows 10 Pro Recommendation</h5>
       <h5>- Free bag, Mouse , headphone Intopic 520</h5>
      </td>

     <?php }?>
    </tr>
   <?php }?>
  </table>
 </div>
</div>
<?php
include("$tpls/footer_1.php");
include("$tpls/footer.php");

include("$tpls/fixe_category.php");
 ?>

