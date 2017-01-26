<?php
include "init.php";
?>
<div id="page-wrapper" style="padding: 15px; width: 1080px;" >
    
    <?php
    
        if (isset($_POST['btnaddslide'])){
            $txttitle=$_POST['txttitle'];
            $position=$_POST['position'];

            $imagesfile1=$_FILES['user_image']['name'];
            $images_dir1=$_FILES['user_image']['tmp_name'];
            $imagSize1=$_FILES['user_image']['size'];

            $errorPost=array();

            if (empty($txttitle)){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please input title
                    </div>';
            }
            if (empty($imagesfile1)){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please choose your image slide
                    </div>';
            }
            if($position==0){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please choose your position banner
                    </div>';
            }
            foreach ($errorPost as $errorShow){
                echo $errorShow;
            }

            if (empty($errorShow)){

                $upload_dir1="../img/banner/";

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

                    $stmt=$con->prepare("INSERT INTO tbl_banner (banner_title,images_banner,position_ban)

          VALUES (:zbanner_title,:zimages_banner,:zposition_ban)
        ");
                    $insert= $stmt->execute(array(
                       'zbanner_title'=>$txttitle,'zimages_banner'=>$userPostImg,'zposition_ban'=>$position
                    ));
                    if ($insert){
                        echo ' <div class="alert alert-success alert-dismissable fade in" style="margin: 0 25px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> '.$txttitle.' save success
                                </div>
                                <hr>';
                    }else{
                        echo '
                                                <div class="alert alert-danger alert-dismissable fade in" style="margin: 0 25px;">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Fail!</strong> '.$title.' save fail
                                                </div>
                        ';
                    }

                }else{
                    echo "Error";
                }



            }

        }
    
    ?>
    
    <!--class row-->
    <div class="row">
        <form method="POST" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row" style="padding: 10px;">
                        <div class="col col-sm-6">
                            <h3 style="color: #428bca;">Create Banner</h3>
                        </div>
                        <div class="col col-sm-6">

                            <div class="pull-right">
                                <button  name="btnaddslide" class=" btn btn-primary"><i class="fa fa-pencil"></i>  Save</button>
                                <a href="slidemanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col col-sm-5">
                            <div class="col col-sm-2">
                                <label class="pull-right">Title</label>
                            </div>
                            <div class="col col-sm-10">
                                <input class="form form-control" type="text" name="txttitle" placeholder="Input banner name">
                            </div>
                            

                        </div>
                        <div class="col col-sm-3"">

                            <div class="form-group">
                                <label class="control-label col-sm-3">Position</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="positionban" name="position">
                                        <option value="0" selected>Select position</option>
                                        <option value="1">Position Left</option>
                                        <option value="2">Position Right</option>
                                        

                                    </select>
                                </div>

                            </div>
                        </div>
                    <div class="col col-sm-3">

                        <input id="upload_banner"  class="input-group" type="file" name="user_image" accept="image/*" />
                    </div>
                    <div class="col col-sm-12"><br>
                        <div class="slide_banner">
                            
                            <img src="../img/logo/slide.png" style="height: 80px; margin-left: 300px;">

                            <div class="info1">
                                <h3>Please select position before brow banner</h3>
                                
                            </div>

                        </div>
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

<?php
include "include/tpls/footer.php";
?>