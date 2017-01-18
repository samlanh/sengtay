<?php
global $con;
function getTitle(){
    global $pageTitle;
    if (isset($pageTitle)){
        echo $pageTitle;
    }else{
        echo 'Default';
    }

}

