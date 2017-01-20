<?php
    function checkItem($select,$from,$value){
        global  $con;
        $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");
        $statement->execute(array($value));
        $count=$statement->rowCount();
        return $count;
    }
function redirectHome($theMsg,$url=null, $seconds=0){
    if ($url===null){
        $url='index.php';
        $link=' Home page ';

    }else{
        // $url=isset($_SEVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']!=''?$_SERVER['HTTP_REFERER'] :'index.php';
        if (isset($_SEVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER']!==''){
            $url=$_SERVER['HTTP_REFERER'];
            $link=' Previous page ';
        }else{
            $url='index.php';
            $link=' Home page ';
        }

    }
    echo "$theMsg";
    echo "<div class='alert alert-info'>You will redirect to <strong>$link</strong> after <strong>$seconds </strong>second</div>";

    header("refresh:$seconds;url=$url");
    exit();

}