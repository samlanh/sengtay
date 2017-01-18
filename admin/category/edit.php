<?php
include "init.php";

$catID=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);



?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php
        if (isset($_POST['btnUpdate'])){
            $menu=$_POST['menu'];
            $txtCat=$_POST['txtCat'];
            $description=$_POST['description'];
            $status=$_POST['status'];
            $keyword=$_POST['keyword'];

            $ErrorSms=array();
            if (empty($txtCat)){
                $ErrorSms[]="<div class='alert alert-danger' style='margin: 5px -15px;'>Menu update can't <strong>Blank</strong> </div>";
            }
            if (empty($description)){
                $description="Description Empty";
            }
            if ($menu==0){
                $ErrorSms[]="<div class='alert alert-danger' style='margin: 5px -15px;'>Please select <strong>Menu</strong> </div>";
            }

            if (empty($keyword)){
                $ErrorSms[]="<div class='alert alert-danger' style='margin: 5px -15px;'>keyword update can't <strong>Blank</strong> </div>";
            }

            foreach ($ErrorSms as $error){
                echo $error;
            }
            if (empty($ErrorSms)){
                $stmt=$con->prepare("UPDATE tbl_category SET category=?,menu_id=?,description=?,keyword=?,status=? WHERE category_id=?");
                $resultUp=$stmt->execute(array($txtCat,$menu,$description,$keyword,$status,$catID));
                if ($resultUp){
                    echo "<div class='alert alert-success' style='margin: 10px -15px 10px -15px'>Update successfull ! <strong> to $txtCat</strong> </div>";
                }else{
                    echo "<div class='alert alert-danger'>Update fail ! <strong> to $txtCat</strong> </div>";
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
                                    <h3 style="color: #428bca;">Update category</h3>
                                </div>
                                <div class="col col-sm-6">

                                    <div class="pull-right">
                                    <button name="btnUpdate" class="btn btn-primary"><i class="fa fa-upload"></i>  Update</button>

                                      <a href="usermanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-body">
                <?php
                   $stmtCat=$con->prepare("SELECT * FROM tbl_category WHERE category_id=? limit 1");
                    $exec=$stmtCat->execute(array($catID));
                    $row=$stmtCat->fetch();
                    $rowsCountMn=$stmtCat->rowCount();

                if ($rowsCountMn>0){
                ?>
             <div class="row">


                                <div class="col col-sm-8">
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Category</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" value="<?php echo $row['category'];?>"  type="text" name="txtCat" placeholder="Menu name" >
                                        </div>
                                    <div class="col col-sm-2"><br>
                                        <label class="pull-right">Description</label>
                                    </div>
                                    <div class="col col-sm-10"><br>
                                        <textarea class="form form-control" name="description" rows="20"style="width: 100%;  "  ><?php echo  $row['description'];?></textarea>
                                    </div>
                                    <textarea class="ckeditor" id="myEditor" name="myEditor" cols="35" rows="20"></textarea>


                                </div>
                                <div class="col col-sm-4"">
                                     <label>Menu</label>
                                     <select class="form form-control" name="menu">
                                         <option class="form form-control" value="0">Select Menu</option>
                                         <?php
                                                $stmt=$con->prepare("SELECT menu_id, menu FROM tbl_menu WHERE status='1'" );
                                                $stmt->execute();
                                                $rows=$stmt->fetchAll();

                                                foreach ($rows as $rowSelCat){
                                                    ?>
                                                    <option class="form form-control" value="<?php echo $rowSelCat['menu_id']?>"<?php if ($rowSelCat['menu_id']=$row['menu_id']) echo "selected";?>><?php echo$rowSelCat['menu']?></option>
                                                    <?php
                                                }


                                         ?>


                                     </select><br>
                                    <label>Possibility</label>
                                    <select class="form form-control" name="status">
                                        <option class="form form-control" value="1" <?php if($row['keyword']==1)echo "selected";  ?>>Public</option>
                                        <option class="form form-control" value="0"<?php if($row['keyword']==0)echo "selected";  ?>>Disable</option>
                                    </select><br>
                                    <label>Keyword</label>
                                    <textarea class="form form-control" rows="5" style="width: 100%;" name="keyword"><?php echo $row['keyword'];  ?></textarea>
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