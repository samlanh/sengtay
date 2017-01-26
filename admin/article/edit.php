<?php
include "init.php";
$id=$_GET['id'];
?>
    <div id="page-wrapper" style="padding: 15px; width: 1080px;" >

        <?php
        $stmt=$con->prepare("SELECT *FROM tbl_article WHERE artcle_id='$id' limit 1");
        $stmt->execute();
        $rowsel=$stmt->fetch();

        if (isset($_POST['btnUpdate'])){
            $title=$_POST['title'];
            $code=$_POST['code'];
            $old_price=$_POST['old_price'];
            $new_price=$_POST['new_price'];
            $description =$_POST['description1'];
            $menu=$_POST['menu'];
            $cat=$_POST['cat'];
            $status=$_POST['status'];
            $arrival=$_POST['arrival'];
            $promotion=$_POST['promotion'];

            $imgFile = $_FILES['imagesUpdate']['name'];
            $tmp_dir = $_FILES['imagesUpdate']['tmp_name'];
            $imgSize = $_FILES['imagesUpdate']['size'];





            $errorPost = array();
            if (empty($title)) {
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Title!</strong>Please input title 
                    </div>';
            }
            if (empty($new_price)) {
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please input price
                    </div>';
            }
            if ($menu==0){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please select menu
                    </div>';
            }
            if ($cat==0){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please input category
                    </div>';
            }
            if (empty($description)){
                $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please input description
                    </div>';
            }

            foreach ( $errorPost as $errorShow){
                echo $errorShow;
            }
            if (empty($errorShow)){

                if ($imgFile){

                    $upload_dir = '../img/'; // upload directory
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $imagesUpdate = rand(1000,1000000).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions))
                    {
                        if($imgSize < 5000000)
                        {
                            unlink($upload_dir.$rowsel['images_pro']);
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
                    $imagesUpdate = $rowsel['images_pro'];
                }

                if (!isset($errMSG)){

                    $stmt=$con->prepare("UPDATE tbl_article SET
                                                            article=?,menu_id=?,category_id=?,old_price=?,new_price=?,images_pro=?,descrip=?,code=?,
                                                            status=?,arrival_comming=?,promotion=? WHERE artcle_id=?
                                                            ");
                    $resultUpdate= $stmt->execute(array($title,$menu,$cat,$old_price,$new_price,$imagesUpdate,$description,$code,
                        $status,$arrival,$promotion,$id
                    ));



                    if ($resultUpdate){
                        echo "<script>
document.location='articlemanage.html'</script>";
                    }else{
                        echo '
                    <div class="alert alert-danger alert-dismissable fade in" style="margin: 0 25px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fail!</strong> '.$title.' update fail
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



              $stmt=$con->prepare("SELECT *FROM tbl_article WHERE artcle_id='$id' limit 1");
              $stmt->execute();
              $rows=$stmt->fetchAll();
             foreach ($rows as $row1){
                ?>

          <div class="row" style="margin: 10px">
              <div class="col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="control-label col-sm-1" for="email">Title</label>
                          <div class="col-sm-11">
                              <input type="text" name="title" class="form-control" value="<?php echo $row1['article']?>"  placeholder="Title...">
                          </div>
                       </div>

                  <div class="form-group">
                      <label class="control-label col-sm-1" for="email">code</label>
                      <div class="col-sm-4">
                          <input type="text"  name="code" class="form-control" value="<?php echo $row1['code']?>"  placeholder="code">
                      </div>
                      <label class="control-label col-sm-1" for="email">Price</label>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control"value="<?php echo $row1['old_price']?>"  name="old_price" placeholder="Old Price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control" value="<?php echo $row1['new_price']?>" name="new_price" placeholder="New price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
                      </div>


                  </div>


                  <div class="form-group">
                      <textarea   class="ckeditor" id="myEditor" name="description1" cols="50" rows="20"><?php echo $row1['descrip']?></textarea>

                  </div>
              </div>

              <div class="col-sm-4 col-xs-4">

                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group">
                              <label class="control-label col-sm-3" >images 250X200</label>
                              <div class="box_img" ><img id="images"   src="../img/<?php echo $row1['images_pro']?>" style="height: 100px; width: 150px;"></div>

                              <input id="fileUpload" style="display: none;" class="input-group" type="file" name="imagesUpdate" accept="image/*" />
                          </div>
                          <hr>

                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Menu</label>
                              <div class="col-sm-9">
                                  <select class="form form-control"  id="menuCreatePost" name="menu">
                                      <option value="0" >Select menu</option>
                                      <?php
                                      $stmt=$con->prepare("SELECT menu_id,menu from tbl_menu WHERE status='1' and trust='1';");
                                      $stmt->execute();
                                      $result=$stmt->fetchAll();
                                      foreach ($result as $row){
                                          ?>
                                          <option value="<?php echo $row['menu_id'];?>" <?php if ( $row['menu_id']==$row1['menu_id'])echo "selected";?>><?php echo $row['menu']?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Category</label>
                              <div class="col-sm-9">
                                  <select class="form-control" id="selectCategoriesPost" name="cat">
                                      <option value="0" >Select category</option>
                                      <?php
                                      $stmt=$con->prepare("SELECT category_id,category from tbl_category WHERE status='1' and trust='1';");
                                      $stmt->execute();
                                      $result=$stmt->fetchAll();
                                      foreach ($result as $row){
                                          ?>
                                          <option value="<?php echo $row['category_id'];?>" <?php if ($row['category_id']==$row1['category_id']) echo 'selected';?>><?php echo $row['category']?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3">Status</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="status">
                                      <option value="1" <?php if ($row1['status']==1)echo ' selected';?> >Public</option>
                                      <option value="0"<?php if ($row1['status']==0)echo ' selected';?>>Disable</option>

                                  </select>
                              </div>

                          </div>


                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Information</label>
                              <div class="col-sm-10">
                                  <label class="radio-inline">
                                    <input type="radio" name="arrival" id="inlineRadio1" value="1" <?php if ($row1['arrival_comming']==1)echo 'checked';?> >Arrival
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="arrival" id="inlineRadio2" value="0" <?php if ($row1['arrival_comming']==0)echo 'checked';?>>Comingsoon
                                  </label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Spacial</label>
                              <div class="col-sm-10">
                                  <label class="radio-inline">
                                      <input type="radio" name="promotion" value="1"  <?php if ($row1['promotion']==1)echo 'checked';?>>Spacial price
                                  </label>
                                  <label class="radio-inline">
                                      <input type="radio" name="promotion"  value="0" <?php if ($row1['promotion']==0)echo 'checked';?>>No spacial
                                  </label>
                              </div>
                          </div>

                          <button class="btn btn-success" name="btnUpdate" id="btnAdd" style="width: 280px;">Update product</button>

                      </div>
                  </div>

              </div>
          </div>
                 <?php


             }

              ?>

      </form>
    </div>

<?php
include "include/tpls/footer.php";
?>