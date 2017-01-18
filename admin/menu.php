<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";


    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "menu/manage.php";
    }else if ($do=='addmenu'){
        include "menu/add.php";
    }else if ($do=='edit'){
        include "menu/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}


