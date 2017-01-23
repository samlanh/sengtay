<?php
include "init.php";
?>

    <!-- Page Content -->
    <div id="page-wrapper">

    <br>
<?php

if (isset($_POST['btnsave'])){
    $titletextinfo=$_POST['titletextinfo'];
    $descritpion=$_POST['descritpion'];
    $orderList=$_POST['orderList'];
    $status=$_POST['status'];
    $formError=array();
    if (empty($titletextinfo)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> title</strong> </div>";
    }
    if (empty($descritpion)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> Description</strong> </div>";
    }
    foreach ($formError as $error){
        echo $error;
    }
    if (empty($formError)){

        $check=checkItem("runtext_title","tbl_runtext",$titletextinfo);
        // $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");

        if ($check){
            echo "<div class='alert alert-danger' style='margin: 10px -15px 10px -15px'>title have  <strong> $titletextinfo already</strong> </div>";
        }else{
            $stmt=$con->prepare("INSERT INTO tbl_runtext(runtext_title,Description,status,orderList) VALUES (:zruntext_title,:zDescription,:zstatus,:zorderList)");
           $result= $stmt->execute(array('zruntext_title'=>$titletextinfo,'zDescription'=>$descritpion,'zstatus'=>$status,'zorderList'=>$orderList));
            if ($result){
                echo ' <div class="alert alert-success alert-dismissable fade in" style="margin: 10px -10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> '.$titletextinfo.' save success
                    </div>
                    ';
            }else{
                echo ' <div class="alert alert-danger alert-dismissable fade in" style="margin: 10px -10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fail!</strong> '.$titletextinfo.' save fail
                    </div>
                    ';
            }
            
        }
    }
}

?>
        <form method="post">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-6">
                                <h3 style="color: #428bca;">Create text infomation</h3>
                            </div>
                            <div class="col col-sm-6">

                                <div class="pull-right">
                                    <button name="btnsave" class="btn btn-primary"><i class="fa fa-upload"></i>  Save</button>

                                    <a href="textinfomanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-body">
                                <div class="row">
                        
                        
                                    <div class="col col-sm-8"><br>
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Title text</label>
                                        </div>
                                        <div class="col col-sm-10">
                                            <input class="form form-control"  type="text" name="titletextinfo" placeholder="title " >
                                        </div>
                        
                                        <div class="col col-sm-12"><br>
                                            <textarea class="ckeditor" id="myEditor" name="descritpion" rows="20"style="width: 100%;  "  ></textarea>
                                        </div>
                        
                        
                        
                                    </div>
                                    <div class="col col-sm-4"">
                                    <label>Order</label>
                                    <select class="form form-control" name="orderList">
                                        <option class="form form-control" value="1">First Column</option>
                                        <option class="form form-control" value="2">Second Column</option>
                                        <option class="form form-control" value="3">Third Column</option>
                        
                                    </select><br>
                                    <label>Status</label>
                                    <select class="form form-control" name="status">
                                        <option class="form form-control" value="1" >Public</option>
                                        <option class="form form-control" value="0">Disable</option>
                                    </select><br>
                        
                                </div>
                            </div>

                    </div>


                </div>
            </form>
                <div class="panel-footer">
                    <?php echo "Create by: ".$_SESSION['username'];?>
                </div>





    </div>
    <!-- /#page-wrapper -->

    <?php
include "include/tpls/footer.php";

