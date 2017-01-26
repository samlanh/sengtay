<?php
include "init.php";

$menuId=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);



?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php
        if (isset($_POST['btnMenuUpdate'])){
            $txtMenu=$_POST['txtMenu'];
            $description=$_POST['description'];
            $status=$_POST['status'];
            $keyword=$_POST['keyword'];

            $menuError=array();
            if (empty($txtMenu)){
                $menuError[]="<div class='alert alert-danger' style='margin: 5px -15px;'>Menu update can't <strong>Blank</strong> </div>";
            }
            if (empty($description)){
                $description="Description Empty";
            }

            if (empty($keyword)){
                $menuError[]="<div class='alert alert-danger' style='margin: 5px -15px;'>keyword update can't <strong>Blank</strong> </div>";
            }

            foreach ($menuError as $error){
                echo $error;
            }
            if (empty($menuError)){
                $stmt=$con->prepare("UPDATE tbl_Menu SET menu=?,description=?,keyword=?,status=? WHERE menu_id=?");
                $resultUp=$stmt->execute(array($txtMenu,$description,$keyword,$status,$menuId));
                if ($resultUp){
                    echo "<div class='alert alert-success' style='margin: 10px -15px 10px -15px'>Update successfull ! <strong> to $txtMenu</strong> </div>";
                }else{
                    echo "<div class='alert alert-danger'>Update fail ! <strong> to $txtMenu</strong> </div>";
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
                                    <h3 style="color: #428bca;">Update Menu</h3>
                                </div>
                                <div class="col col-sm-6">

                                    <div class="pull-right">
                                    <button name="btnMenuUpdate" class="btn btn-primary"><i class="fa fa-upload"></i>  Update</button>

                                      <a href="menumanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-body">
                <?php



                   $stmtMn=$con->prepare("SELECT * FROM tbl_menu WHERE menu_id=? limit 1");
                    $exec=$stmtMn->execute(array($menuId));
                    $rowsMn=$stmtMn->fetch();
                    $rowsCountMn=$stmtMn->rowCount();

                if ($rowsCountMn>0){


                ?>


                                  <div class="row">


                                <div class="col col-sm-8">
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Menu Name</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" value="<?php echo $rowsMn['menu'];?>"  type="text" name="txtMenu" placeholder="Menu name" >
                                        </div>
                                   
                                    <div class="col col-sm-12"><br>
                                        <textarea class="ckeditor" id="myEditor" name="description" rows="20"style="width: 100%;  "  ><?php echo  $rowsMn['description'];?></textarea>
                                    </div>

                                </div>
                                <div class="col col-sm-4"">
                                    <label>Possibility</label>
                                    <select class="form form-control" name="status">
                                        <option class="form form-control" value="1" <?php if($rowsMn['keyword']==1)echo "selected";  ?>>Public</option>
                                        <option class="form form-control" value="0"<?php if($rowsMn['keyword']==0)echo "selected";  ?>>Disable</option>
                                    </select><br>
                                    <label>Keyword</label>
                                    <textarea class="form form-control" rows="5" style="width: 100%;" name="keyword"><?php echo $rowsMn['keyword'];  ?></textarea>
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