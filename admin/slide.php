<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";
    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "slide/manage.php";
    }else if ($do=='addslide'){
        include "slide/add.php";
    }else if ($do=='edit'){
        include "slide/edit.php";
    }
}else{
    header('Location:index.html');
    exit();
}