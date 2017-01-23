<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "itemfooter/manage.php";
    }else if ($do=='add'){
        include "itemfooter/add.php";
    }else if ($do=='edit'){
        include "itemfooter/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}