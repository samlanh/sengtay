<?php
include "init.php";
?>

    <!-- Page Content -->
    <div id="page-wrapper">

    <br>
<?php

if (isset($_POST['btnsave'])){
    $txtFooter=$_POST['txtFooter'];
    $descritpion=$_POST['descritpion'];
    $categoryfooter=$_POST['categoryfooter'];
    $orderList=$_POST['orderList'];
    $status=$_POST['status'];
    $formError=array();
    if (empty($txtFooter)){
        $formError[]="<div class='alert alert-danger'>Please input your <strong> footer title</strong> </div>";
    }
    foreach ($formError as $error){
        echo $error;
    }
    if (empty($formError)){

        $checkcat=checkItem("linkFooter","tbl_link_footer",$txtFooter);
        // $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");

        if ($checkcat){
            echo "<div class='alert alert-danger' style='margin: 10px -15px 10px -15px'>Footer category title have  <strong> $txtFooter already</strong> </div>";
        }else{
            $stmt=$con->prepare("INSERT INTO tbl_link_footer(linkFooter,descrition,status,orderList,footer_cat_id)
                                                      VALUES (:zlinkFooter,:zdescrition,:zstatus,:zorderList,:zfooter_cat_id)");
           $result= $stmt->execute(array('zlinkFooter'=>$txtFooter,'zdescrition'=>$descritpion,'zstatus'=>$status,'zorderList'=>$orderList,'zfooter_cat_id'=> $categoryfooter ));
            if ($result){
                echo ' <div class="alert alert-success alert-dismissable fade in" style="margin: 10px -10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> '.$txtFooter.' save success
                    </div>
                  ';
            }else{
                echo ' <div class="alert alert-danger alert-dismissable fade in" style="margin: 10px -10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fail!</strong> '.$txtFooter.' save fail
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
                                <h3 style="color: #428bca;">Create item footer</h3>
                            </div>
                            <div class="col col-sm-6">

                                <div class="pull-right">
                                    <button name="btnsave" class="btn btn-primary"><i class="fa fa-upload"></i>  Save</button>

                                    <a href="footercatmanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-body">
                                <div class="row">
                        
                        
                                    <div class="col col-sm-8"><br>
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Footer Title</label>
                                        </div>
                                        <div class="col col-sm-10">
                                            <input class="form form-control"  type="text" name="txtFooter" placeholder="footer title" >
                                        </div>
                        
                                        <div class="col col-sm-12"><br>
                                            <textarea class="ckeditor" id="myEditor" name="descritpion" rows="20"style="width: 100%;  "  ></textarea>
                                        </div>
                        
                        
                        
                                    </div>
                                    <div class="col col-sm-4"">
                                    <label>Footer category</label>
                                    <select class="form form-control" name="categoryfooter">
                                        <?php
                                        $stmt=$con->prepare("SELECT * FROM tbl_footer_cat");
                                        $stmt->execute();
                                        $rows=$stmt->fetchAll();
                                        foreach ($rows as $row){
                                            echo '<option class="form form-control" value="'.$row['footer_cat_id'].'">'.$row['footer_title'].'</option>';

                                        }
                                          ?>



                                    </select><br>
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

