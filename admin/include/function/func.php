<?php
    function checkItem($select,$from,$value){
        global  $con;
        $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");
        $statement->execute(array($value));
        $count=$statement->rowCount();
        return $count;
    }
/*function insert($txtMenu,$menuDes,$menuType,$menuKeyword)
{
    global $con;
    $stmt = $con->prepare("INSERT INTO tbl_menu(Menu,Description,Access,Keyword) VALUES (:zmenu,:zDesc,:zAccess,:zKeyword)");
    $stmt->execute(array
        (
            'zmenu' => $txtMenu,
            'zDesc' => $menuDes,
            'zAccess' => $menuType,
            'zKeyword' => $menuKeyword

        )
    );
}*/