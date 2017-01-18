<?php

function insert($txtMenu,$menuDes,$menuKeyword,$status){
    global  $con;
    $stmt=$con->prepare("INSERT INTO tbl_menu(Menu,description,keyword,status) VALUES (:zmenu,:zDesc,:zKeyword,:zstatus)");
    $insertmenu=$stmt->execute(array
        (
            'zmenu'=>$txtMenu,
            'zDesc'=>$menuDes,
            'zKeyword'=>$menuKeyword,
            'zstatus'=>$status
        )
    );

    if ($insertmenu){
        echo "<div class='alert alert-success' style='margin: 10px -15px 10px -15px;'>Insert menu  <strong> $txtMenu</strong> </div>";
    }else{
        echo "<div class='alert alert-danger'>Insert menu  <strong> $txtMenu</strong> </div>";
    }

}

function insertcat($category,$menu_id,$description,$keyword,$status){
    global  $con;
    $stmt=$con->prepare("INSERT INTO tbl_category (category,menu_id,description,keyword,status) VALUES (:zcat,:zmenu_id,:zDesc,:zkeyword,:zstatus)");
    $insertcat=$stmt->execute(array
        (
            'zcat'=>$category,
            'zmenu_id'=>$menu_id,
            'zDesc'=>$description,
            'zkeyword'=>$keyword,
            'zstatus'=>$status
        )
    );
    if ($insertcat){
        echo "<div class='alert alert-success' style='margin: 10px -15px 10px -15px;'>Insert category  <strong> $category Success</strong> </div>";
    }else{
        echo "<div class='alert alert-danger'>Fail Insert category  <strong> $category</strong> </div>";
    }

}