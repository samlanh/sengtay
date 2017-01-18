<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "article/manage.php";
    }else if ($do=='addart'){
        include "article/add.php";
    }else if ($do=='edit'){
        include "category/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}