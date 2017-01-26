<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "banner/manage.php";
    }else if ($do=='add'){
        include "banner/add.php";
    }else if ($do=='edit'){
        include "banner/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}