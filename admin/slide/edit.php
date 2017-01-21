<?php
include "init.php";
$id=$_GET['id'];
?>
    <div id="page-wrapper" style="padding: 15px; width: 1080px;" >

        <?php


        if (isset($_POST['btnUpSlide'])){
            $titleSlide=$_POST['titleSlide'];
            $orderSlide=$_POST['orderSlide'];

            $imgFile = $_FILES['imagesUpdate']['name'];
            $tmp_dir = $_FILES['imagesUpdate']['tmp_name'];
            $imgSize = $_FILES['imagesUpdate']['size'];





            $errorPost = array();
            if (empty($titleSlide)) {
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Title!</strong>Please input title 
                    </div>';
            }



            foreach ( $errorPost as $errorShow){
                echo $errorShow;
            }
            if (empty($errorShow)){
                $stmt=$con->prepare("SELECT * FROM tbl_slide WHERE slide_id='$id' limit 1");
                $stmt->execute();
                $rowsel1=$stmt->fetch();

                if ($imgFile){

                    $upload_dir = '../img/slide/'; // upload directory
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $imagesUpdate = rand(1000,1000000).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions))
                    {
                        if($imgSize < 5000000)
                        {
                            unlink($upload_dir.$rowsel1['slide_image']);
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
                    $imagesUpdate = $rowsel1['slide_image'];
                }

                if (!isset($errMSG)){

                    $stmt=$con->prepare("UPDATE tbl_slide SET
                                                            slide_tile=?,slide_image=?,orderSlide=? WHERE slide_id=?
                                                            ");
                    $resultUpdate= $stmt->execute(array($titleSlide,$imagesUpdate,$orderSlide,$id));



                    if ($resultUpdate){
                        echo "<script>
document.location='slidemanage.html'</script>";
                    }else{
                        echo '
                    <div class="alert alert-danger alert-dismissable fade in" style="margin: 0 25px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fail!</strong> '.$titleSlide.' update fail
                    </div>
              ';

                    }


                }else{
                    echo "Error";
                }

            }





        }

        ?>
      <form method="POST" enctype="multipart/form-data" class="form-horizontal" >


              <?php



              $stmt=$con->prepare("SELECT *FROM tbl_slide WHERE slide_id='$id' limit 1");
              $stmt->execute();
              $rows=$stmt->fetchAll();
             foreach ($rows as $row1){


                ?>

                 <!--class row-->
                 <div class="row">
                     <form method="POST" enctype="multipart/form-data">
                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 <div class="row" style="padding: 10px;">
                                     <div class="col col-sm-6">
                                         <h3 style="color: #428bca;">Create slide</h3>
                                     </div>
                                     <div class="col col-sm-6">

                                         <div class="pull-right">
                                             <button  name="btnUpSlide" class=" btn btn-primary"><i class="fa fa-pencil"></i>  Update</button>
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
                                             <input class="form form-control" type="text" name="titleSlide" value="<?php echo $row1['slide_tile'];?>" placeholder="Input slide name">
                                         </div>


                                     </div>
                                     <div class="col col-sm-3"">

                                     <div class="form-group">
                                         <label class="control-label col-sm-4">Order</label>
                                         <div class="col-sm-8">
                                             <select class="form-control" name="orderSlide">
                                                 <option value="1" <?php if($row1['orderSlide']==1)echo "selected";?>>First slide</option>
                                                 <option value="2" <?php if($row1['orderSlide']==2)echo "selected";?>>Second slide</option>
                                                 <option value="3"<?php if($row1['orderSlide']==3)echo "selected";?>>Third slide</option>
                                                 <option value="4"<?php if($row1['orderSlide']==4)echo "selected";?>>Last slide</option>

                                             </select>
                                         </div>

                                     </div>
                                 </div>
                                 <div class="col col-sm-3">

                                     <input id="uploadslide"  class="input-group" type="file" name="imagesUpdate" accept="image/*" />
                                 </div>
                                 <div class="col col-sm-12"><br>
                                     <div class="slide_backend">

                                         <img src="../img/slide/<?php echo $row1['slide_image'];?>" style="height: 320px;width: 1004px;z-index: 1">

                                         <div class="info" style="z-index: -1">
                                             <h3>Recommend width 1024X340</h3>

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
                 <?php


             }

              ?>

      </form>
    </div>

<?php
include "include/tpls/footer.php";
?>