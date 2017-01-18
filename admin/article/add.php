<?php
include "init.php";
?>

    <div id="page-wrapper" style="padding: 15px;">
      <form method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="row" style="margin: 10px">
              <div class="col-sm-8 col-xs-8">

                      <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" placeholder="Enter email">
                          </div>

                      </div>
                  <div class="form-group">
                      <textarea  name="catDes" class="ckeditor" id="myEditor" name="myEditor" cols="35" rows="20"></textarea>

                  </div>



              </div>
              <div class="col-sm-4 col-xs-4">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Email:</label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                              </div>

                          </div>

                      </div>
                  </div>
              </div>

          </div>
      </form>
    </div>
<?php
include "include/tpls/footer.php";
