<?php
include "init.php";

$catfootID=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);



?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php
        if (isset($_POST['btnUpdate'])){
            $txtFooterCat=$_POST['txtFooterCat'];
            $descritpion=$_POST['descritpion'];
            $orderList=$_POST['orderList'];
            $status=$_POST['status'];
            $ErrorSms=array();
            if (empty($txtFooterCat)){
                $ErrorSms[]="<div class='alert alert-danger' style='margin: 5px -15px;'>Menu update can't <strong>Blank</strong> </div>";
            }
            foreach ($ErrorSms as $error){
                echo $error;
            }
            if (empty($ErrorSms)){
                $stmt=$con->prepare("UPDATE tbl_footer_cat SET footer_title=?,descritpion=?,status=?,orderList=? WHERE footer_cat_id=?");
                $resultUp=$stmt->execute(array($txtFooterCat,$descritpion,$status,$orderList,$catfootID));
                if ($resultUp){
                    echo "<script>
                        document.location='footercatmanage.html'
                        </script>";
                }else{
                    echo "<div class='alert alert-danger'>Update fail ! <strong> to $txtFooterCat</strong> </div>";
                }
            }
        }

        ?>
    <!-- /.row -->
   <form method="post">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-6">
                                    <h3 style="color: #428bca;">Update Footer Category</h3>
                                </div>
                                <div class="col col-sm-6">

                                    <div class="pull-right">
                                    <button name="btnUpdate" class="btn btn-primary"><i class="fa fa-upload"></i>  Update</button>

                                      <a href="footercatmanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-body">
                <?php
                   $stmtCat=$con->prepare("SELECT * FROM tbl_footer_cat WHERE footer_cat_id=? limit 1");
                    $exec=$stmtCat->execute(array($catfootID));
                    $row=$stmtCat->fetch();
                    $rowCounFooCat=$stmtCat->rowCount();

                if ($rowCounFooCat>0){
                ?>
             <div class="row">


                                <div class="col col-sm-8"><br>
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Footer Title</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" value="<?php echo $row['footer_title'];?>"  type="text" name="txtFooterCat" placeholder="Menu name" >
                                        </div>

                                    <div class="col col-sm-12"><br>
                                        <textarea class="ckeditor" id="myEditor" name="descritpion" rows="20"style="width: 100%;  "  ><?php echo  $row['descritpion'];?></textarea>
                                    </div>



                                </div>
                                <div class="col col-sm-4"">
                                     <label>Order</label>
                                     <select class="form form-control" name="orderList">
                                         <option class="form form-control" value="1"<?php if($row['orderList']==1)echo "selected";  ?>>First Column</option>
                                         <option class="form form-control" value="2"<?php if($row['orderList']==2)echo "selected";  ?>>Second Column</option>
                                         <option class="form form-control" value="3"<?php if($row['orderList']==3)echo "selected";  ?>>Third Column</option>

                                     </select><br>
                                    <label>Status</label>
                                    <select class="form form-control" name="status">
                                        <option class="form form-control" value="1" <?php if($row['status']==1)echo "selected";  ?>>Public</option>
                                        <option class="form form-control" value="0"<?php if($row['status']==0)echo "selected";  ?>>Disable</option>
                                    </select><br>

                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        </div>
                        <div class="panel-footer">
                            <?php echo "Create by: ".$_SESSION['username'];?>
                        </div>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
    </form>

    </div>
    <!-- /#page-wrapper -->

    <?php
include "include/tpls/footer.php";

?>