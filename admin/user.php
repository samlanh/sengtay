<?php

session_start();

if (isset($_SESSION['username'] )&& $_SESSION['status']){
    include "connection.php";


    $do=isset($_GET['do'])?$do=$_GET['do']:"manage";
    if ($do=="manage"){
        include "user/listuser.php";
    }else if ($do=='listuser'){
        include "user/listuseradmin.php";
    }else if ($do=='adduser'){
        include "user/adduser.php";
    }else if ($do=='edit'){
        include "user/edituser.php";
    }
}else{
    header('Location:index.html');
    exit();
}
