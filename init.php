<?php

$tpls="includer/tpls";
 include("$tpls/header.php");
 include("$tpls/menu.php");
if (empty($_GET['id'])){
 include("$tpls/slider.php");
}




 ?>