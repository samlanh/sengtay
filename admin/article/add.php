<?php
include "init.php";
?>
    <div id="page-wrapper" style="padding: 15px; width: 1080px;" >




        <?php

      if (isset($_POST['btnAdd'])){
         $userId= $_SESSION['ID'];
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

          $imagesfile1=$_FILES['user_image1234']['name'];
          $images_dir1=$_FILES['user_image1234']['tmp_name'];
          $imagSize1=$_FILES['user_image1234']['size'];




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
          if (empty($imagesfile1)){
              $errorPost[] = '<div class="alert alert-danger alert-dismissable fade in" style="font-size: 15px;margin: 10px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please select image product
                    </div>';
          }

          foreach ( $errorPost as $errorShow){
              echo $errorShow;
          }
          if (empty($errorShow)){
              $upload_dir1="../img/";

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

                  $stmt=$con->prepare("INSERT INTO tbl_article (article,menu_id,category_id,old_price,new_price,images_pro,descrip,code,status,user_id,arrival_comming,promotion)

          VALUES (:zarticle,:zmenu_id,:zcategory_id,:zold_price,:znew_price,:images_pro,:zdescription,:zcode,:zstatus,:zuser_id,:zarrival_comming,:zpromotion)
        ");
                  $insert= $stmt->execute(array(
                      'zarticle'=>$title,'zmenu_id'=>$menu,'zcategory_id'=>$cat,'zold_price'=>$old_price,
                      'znew_price'=>$new_price,'images_pro'=>$userPostImg,'zdescription'=>$description,'zcode'=>$code,'zstatus'=>$status,
                      'zuser_id'=>$userId,'zarrival_comming'=>$arrival,'zpromotion'=>$promotion
                  ));
                  if ($insert){
                      echo ' <div class="alert alert-success alert-dismissable fade in" style="margin: 0 25px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> '.$title.' save success
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
      <form method="POST" enctype="multipart/form-data" class="form-horizontal" >
          <div class="row" style="margin: 10px">
              <div class="col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="control-label col-sm-1" for="email">Title</label>
                          <div class="col-sm-11">
                              <input type="text" name="title" class="form-control"  placeholder="Title...">
                          </div>
                       </div>

                  <div class="form-group">
                      <label class="control-label col-sm-1" for="email">code</label>
                      <div class="col-sm-4">
                          <input type="text"  name="code" class="form-control"  placeholder="code">
                      </div>
                      <label class="control-label col-sm-1" for="email">Price</label>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control" name="old_price" placeholder="Old Price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control" name="new_price" placeholder="New price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
                      </div>


                  </div>


                  <div class="form-group">
                      <textarea   class="ckeditor" id="myEditor" name="description1" cols="50" rows="20"></textarea>

                  </div>
              </div>

              <div class="col-sm-4 col-xs-4">

                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group">
                              <label class="control-label col-sm-3" >images 200X150</label>
                              <div class="box_img" ><img id="images" src="../img/pp.png" style="height: 100px; width: 150px;"></div>

                              <input id="fileUpload" style="display: none;" class="input-group" type="file" name="user_image1234" accept="image/*" />
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
                                          <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu']?></option>
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
                                  </select>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3">Status</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="status">
                                      <option value="1" selected>Public</option>
                                      <option value="0">Disable</option>

                                  </select>
                              </div>

                          </div>


                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Information</label>
                              <div class="col-sm-10">
                                  <label class="radio-inline">
                                    <input type="radio" name="arrival" id="inlineRadio1" value="1" checked>Arrival
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="arrival" id="inlineRadio2" value="0">Comingsoon
                                  </label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Promotion</label>
                              <div class="col-sm-10">
                                  <label class="radio-inline">
                                      <input type="radio" name="promotion" value="1">Promotion
                                  </label>
                                  <label class="radio-inline">
                                      <input type="radio" name="promotion" checked value="0">No promoton
                                  </label>
                              </div>
                          </div>

                          <button class="btn btn-success" name="btnAdd" id="btnAdd" style="width: 280px;">Save</button>

                      </div>
                  </div>

              </div>

          </div>
      </form>
    </div>

<?php
include "include/tpls/footer.php";
?>