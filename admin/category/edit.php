<?php
include "init.php";

$catID=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);



?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php
        $stmt=$con->prepare("SELECT *FROM tbl_category WHERE category_id='$catID' limit 1");
        $stmt->execute();
        $rowsel=$stmt->fetch();
        if (isset($_POST['btnUpdate'])){
            $menu=$_POST['menu'];
            $txtCat=$_POST['txtCat'];
            $description=$_POST['description'];
            $status=$_POST['status'];
            $keyword=$_POST['keyword'];

            $imgFile1 = $_FILES['cat_banner']['name'];
            $tmp_dir1 = $_FILES['cat_banner']['tmp_name'];
            $imgSize1 = $_FILES['cat_banner']['size'];


            $imgFile = $_FILES['imagesUpdate']['name'];
            $tmp_dir = $_FILES['imagesUpdate']['tmp_name'];
            $imgSize = $_FILES['imagesUpdate']['size'];

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
                if ($imgFile1){

                    $upload_dir1 = '../img/banner/'; // upload directory
                    $imgExt1 = strtolower(pathinfo($imgFile1,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions1 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $image_cat_banner = rand(1000,1000000).".".$imgExt1;
                    if(in_array($imgExt1, $valid_extensions1))
                    {
                        if($imgSize < 5000000)
                        {
                            unlink($upload_dir1.$rowsel['cat_banner']);
                            move_uploaded_file($tmp_dir1,$upload_dir1.$image_cat_banner);
                        }
                        else
                        {
                            $errMSG = "Sorry, your banner images is too large it should be less then 5MB";
                        }
                    }
                    else
                    {
                        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }else{
                    $image_cat_banner = $rowsel['cat_banner'];
                }

                if ($imgFile){

                    $upload_dir = '../img/logo/'; // upload directory
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $imagesUpdate = rand(1000,1000000).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions))
                    {
                        if($imgSize < 5000000)
                        {
                            unlink($upload_dir.$rowsel['icon']);
                            move_uploaded_file($tmp_dir,$upload_dir.$imagesUpdate);
                        }
                        else
                        {
                            $errMSG = "Sorry, your file is too large it should be less then 5MB";
                        }
                    }
                    else
                    {
                        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }else{
                    $imagesUpdate = $rowsel['icon'];
                }
                if (!isset($errMSG)){
                    $stmt=$con->prepare("UPDATE tbl_category SET category=?,menu_id=?,description=?,keyword=?,status=?,icon=?,cat_banner=? WHERE category_id=?");
                    $resultUp=$stmt->execute(array($txtCat,$menu,$description,$keyword,$status,$imagesUpdate,$image_cat_banner,$catID));
                    if ($resultUp){
                        echo "<div class='alert alert-success' style='margin: 10px -15px 10px -15px'>Update successfull ! <strong> to $txtCat</strong> </div>";
                    }else{
                        echo "<div class='alert alert-danger'>Update fail ! <strong> to $txtCat</strong> </div>";
                    }
                }




            }
        }

        ?>
    <!-- /.row -->
   <form method="post" enctype="multipart/form-data">
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

                                      <a href="categorymanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> Back</a>
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


                                <div class="col col-sm-8"><br>
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Category</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" value="<?php echo $row['category'];?>"  type="text" name="txtCat" placeholder="Menu name" >
                                        </div>

                                    <div class="col col-sm-12"><br>
                                        <textarea class="ckeditor" id="myEditor" name="description" rows="20"style="width: 100%;  "  ><?php echo  $row['description'];?></textarea>
                                    </div>
                                    <div class="col col-sm-12"><br>
                                        <label>Banner of Category</label>
                                        <div class="categoryBannerShowBackend">
                                            <div class="img_in">Recommand 1024X135</div>
                                            <img  id="images_cat" src="../img/banner/<?php echo $row['cat_banner'];?>" style="max-width: 650px;">
                                        </div>
                                        <input  id="fileUploadCat" style="display: none;" class="input-group" type="file" name="cat_banner" accept="image/*" />

                                    </div>



                                </div>
                                <div class="col col-sm-4"">
                 <div class="form-group">
                     <label class="control-label col-sm-3" >images 250X200</label>
                     <div class="box_img" ><img id="images"   src="../img/logo/<?php echo $row['icon']?>" style="height: 60px; width: 60px;"></div>

                     <input id="fileUpload" style="display: none;" class="input-group" type="file" name="imagesUpdate" accept="image/*" />
                 </div><br/><br/><br/><br/><br/><br/>
                                     <label>Menu</label>
                                     <select class="form form-control" name="menu">
                                         <option class="form form-control" value="0">Select Menu</option>
                                         <?php
                                                $stmt=$con->prepare("SELECT menu_id, menu FROM tbl_menu WHERE status='1'" );
                                                $stmt->execute();
                                                $rows=$stmt->fetchAll();

                                                foreach ($rows as $rowSelCat){
                                                    ?>
                                                    <option class="form form-control" value="<?php echo $rowSelCat['menu_id']?>"<?php if ($rowSelCat['menu_id']==$row['menu_id']) echo "selected";?>><?php echo $rowSelCat['menu']?></option>
                                                    <?php
                                                }


                                         ?>


                                     </select><br>
                                    <label>Status</label>
                                    <select class="form form-control" name="status">
                                        <option class="form form-control" value="1" <?php if($row['status']==1)echo "selected";  ?>>Public</option>
                                        <option class="form form-control" value="0"<?php if($row['status']==0)echo "selected";  ?>>Disable</option>
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