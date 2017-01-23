<?php
include "init.php";

$itemfooter=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);



?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php
        if (isset($_POST['btnUpdate'])){
            $txtitemfooter=$_POST['txtitemfooter'];
            $descritpion=$_POST['descritpion'];
            $orderList=$_POST['orderList'];
            $categoryFooter=$_POST['categoryFooter'];
            $status=$_POST['status'];
            $ErrorSms=array();
            if (empty($txtitemfooter)){
                $ErrorSms[]="<div class='alert alert-danger' style='margin: 5px -15px;'>item title update can't <strong>Blank</strong> </div>";
            }
            foreach ($ErrorSms as $error){
                echo $error;
            }
            if (empty($ErrorSms)){
                $stmt=$con->prepare("UPDATE tbl_link_footer SET linkFooter=?,descrition=?,status=?,orderList=?,footer_cat_id=? WHERE link_footer_id=?");
                $resultUp=$stmt->execute(array($txtitemfooter,$descritpion,$status,$orderList,$categoryFooter,$itemfooter));
                if ($resultUp){
                    echo "<script>
                        document.location='itemfootermanage.html'
                        </script>";
                }else{
                    echo "<div class='alert alert-danger'>Update fail ! <strong> to $txtitemfooter</strong> </div>";
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
                                    <h3 style="color: #428bca;">Update item footer</h3>
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
                   $stmtCat=$con->prepare("SELECT * FROM tbl_link_footer WHERE link_footer_id=? limit 1");
                    $exec=$stmtCat->execute(array($itemfooter));
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
                                              <input class="form form-control" value="<?php echo $row['linkFooter'];?>"  type="text" name="txtitemfooter" placeholder="Menu name" >
                                        </div>

                                    <div class="col col-sm-12"><br>
                                        <textarea class="ckeditor" id="myEditor" name="descritpion" rows="20"style="width: 100%;  "  ><?php echo  $row['descrition'];?></textarea>
                                    </div>



                                </div>
                                <div class="col col-sm-4"">
                                     <label>Footer Category</label>
                                     <select class="form form-control" name="categoryFooter">
                                         <?php
                                            $stmt=$con->prepare("SELECT * FROM tbl_footer_cat WHERE trust='1'");
                                         $stmt->execute();
                                            $rows1=$stmt->fetchAll();
                                            foreach ($rows1 as $rowcat){
                                                ?>
                                                <option class="form form-control" value="<?php echo $rowcat['footer_cat_id']  ?>"<?php if ($rowcat['footer_cat_id']==$row['footer_cat_id']) echo "selected";?>><?php echo $rowcat['footer_title']  ?></option>

                                                <?php
                                            }
                                         ?>
                                      </select>
                                      <br>

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