<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "category/manage.php";
    }else if ($do=='addcat'){
        include "category/add.php";
    }else if ($do=='edit'){
        include "category/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}