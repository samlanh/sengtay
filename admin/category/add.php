<?php
include "init.php";


?>

    <!-- Page Content -->
    <div id="page-wrapper">

    <br>
<?php

if (isset($_POST['btnAddCat'])){
    $txtCat=$_POST['txtCat'];
    $catDes=$_POST['catDes'];
    $menu=$_POST['menu'];
    $ststus=$_POST['ststus'];
    $keyword=$_POST['keyword'];
    $id_category=$_POST['id_category'];

    $imagesfile1=$_FILES['user_image1234']['name'];
    $images_dir1=$_FILES['user_image1234']['tmp_name'];
    $imagSize1=$_FILES['user_image1234']['size'];


    $formError=array();
    if (empty($txtCat)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> menu name</strong> </div>";
    }
    if (empty($keyword)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> keyword</strong> </div>";
    }
    if (empty($id_category)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> id category</strong> </div>";
    }
    if ($menu==0){
        $formError[]="<div class='alert alert-danger'>Plase select <strong> menu</strong> </div>";
    }
    foreach ($formError as $error){
        echo $error;
    }
    if (empty($formError)){

        $checkcat=checkItem("category","tbl_category",$txtCat);
        // $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");

        if ($checkcat){
            echo "<div class='alert alert-danger' style='margin: 10px -15px 10px -15px'>Category have  <strong> $txtCat already</strong> </div>";
        }else{

            $upload_dir1="../img/logo/";

            $imgExt1=strtolower(pathinfo($imagesfile1,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userPostImg=rand(1000,1000000).".".$imgExt1;
            if (in_array($imgExt1,$valid_extensions)){
                if ($imagSize1<5000000){
                    move_uploaded_file($images_dir1,$upload_dir1.$userPostImg);
                }else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            if (!isset($errMSG)){
                insertcat($txtCat,$menu,$catDes,$keyword,$ststus,$id_category,$userPostImg);
            }
        }
    }
}

?>
    <!-- /.row -->
    <div class="row">
        <a target="_blank" href="#"></a>
        <form method="POST" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-6">
                                    <h3 style="color: #428bca;">Create category</h3>
                                </div>
                                <div class="col col-sm-6">

                                    <div class="pull-right">
                                    <button  name="btnAddCat" class=" btn btn-primary"><i class="fa fa-pencil"></i>  Save</button>
                                      <a href="#" class="btn btn-danger "><i class="fa fa-backward"></i> back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-body">
                            <div class="row">
                                <div class="categoryBanner">
                                   
                                 </div>
                                <div class="col col-sm-8">

                                        <div class="col col-sm-2">
                                            <label class="pull-right">Category</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" type="text" name="txtCat" placeholder="Input new Category name">
                                        </div>

                                    <div class="col col-sm-12"><br>

                                        <textarea  name="catDes" class="ckeditor" id="myEditor" name="myEditor" cols="35" rows="20"></textarea>
                                    </div>

                                </div>
                                <div class="col col-sm-4"">



                                    <div class="form-group">
                                        <label>Icon category</label>
                                        <div class="box_img" ><img id="images" src="../img/pp.png" style="height: 100px; width: 150px;"></div>

                                        <input style="visibility: hidden " id="fileUpload" class="input-group" type="file" name="user_image1234" accept="image/*" />
                                    </div>

                                <label>ID Category</label>
                                <input class="form form-control" type="text" name="id_category" placeholder="id search">
                                <label>Menu</label>
                                <select class="form form-control" name="menu" >

                                    <option class="form form-control" value="0">Select Menu</option>
                                    <?php
                                    $trust=1;
                                    $status=1;
                                    $stmt=$con->prepare("SELECT menu_id,menu FROM tbl_menu WHERE status='$status' AND trust='$trust'");
                                    $stmt->execute();
                                    $rows=$stmt->fetchAll();
                                    foreach ($rows as $row){
                                       ?>
                                        <option class="form form-control" value="<?php echo $row['menu_id'];?>"><?php echo $row['menu'];?></option>
                                       <?php
                                    }


                                    ?>
                                </select><br>
                                    <label>Possibility</label>
                                    <select class="form form-control" name="ststus" >
                                        <option class="form form-control" value="1">Public</option>
                                        <option class="form form-control" value="0">UnPublic</option>
                                    </select><br>
                                    <label>Keyword</label>
                                    <textarea name="keyword" class="form form-control" rows="5" style="width: 100%;" ></textarea>

                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <?php echo "Create by: ".$_SESSION['username'];?>
                        </div>
                    </div>
        </form>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->



    </div>
    <!-- /#page-wrapper -->

    <?php
include "include/tpls/footer.php";

