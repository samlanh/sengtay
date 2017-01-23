<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "textinfo/manage.php";
    }else if ($do=='add'){
        include "textinfo/add.php";
    }else if ($do=='edit'){
        include "textinfo/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}



