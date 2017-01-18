<?php
$dsn='mysql:host=localhost;dbname=db_sengtay_computer';
$user='root';
$pass='';
$option=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');

try{
    $con=new PDO($dsn,$user,$pass,$option);
    //echo 'Connection Sucessful';
}catch(PDOException $e){
    echo $e->getMessage();

}
?>

