<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "footercat/manage.php";
    }else if ($do=='addcatfooter'){
        include "footercat/add.php";
    }else if ($do=='edit'){
        include "footercat/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}