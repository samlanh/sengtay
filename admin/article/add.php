<?php
include "init.php";
?>
    <div id="page-wrapper" style="padding: 15px;">
      <form method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="row" style="margin: 10px">
              <div class="col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Title</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" placeholder="Title...">
                          </div>
                       </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Old Price</label>
                          <div class="col-sm-4">
                              <input type="float" class="form-control" id="email" placeholder="Old Price...">
                          </div>

                        <label class="control-label col-sm-2" for="email">New Price</label>
                          <div class="col-sm-4">
                              <input type="email" class="form-control" id="email" placeholder="New Price...">
                          </div>
                    </div>

                  <div class="form-group">
                      <textarea  name="catDes" class="ckeditor" id="myEditor" name="myEditor" cols="50" rows="20"></textarea>

                  </div>
              </div>

              <div class="col-sm-4 col-xs-4">
                  <div class="panel panel-default">
                      <div class="panel-body">
                              <div class="form-group">
                                <label class="control-label col-sm-3 " for="email">Category:&nbsp</label>
                                  <div class="col-sm-10">
                                    <select class="form-control">
                                      <option>-select-</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Menu</label>
                                  <div class="col-sm-10">
                                      <select class="form-control">
                                        <option>-select-</option>
                                        <option>.Public</option>
                                        <option>.Disable</option>
                                        
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Status</label>
                                  <div class="col-sm-10">
                                      <select class="form-control">
                                        <option>-select-</option>
                                        <option value="1" selected>Public</option>
                                        <option value="0">Disable</option>
                                      </select>
                                  </div>
                              </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Promotion:&nbsp</label>
                              <div class="col-sm-10">
                                  <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">Arrival
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">Comingsoon
                                  </label>
                              </div>
                            </div>

                              <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Promotion:&nbsp</label>
                                  <div class="col-sm-10">
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" id="blankCheckbox" value="1" aria-label="" checked>Promotion
                                        </label>
                                      </div>
                                  </div>
                              </div>

                      </div>
                  </div>
                    <div class="panel panel-default">
                      <div class="panel-body">
                         <div class="form-group">
                          <label class="control-label col-sm-3" >Input-Img</label>
                          <div class="box_img" ><img  src="../img/pp.png"class="img-thumbnail img_box"></div>
                         </div> 
                       </div>
                    </div>  
              </div>

          </div>
      </form>
    </div>

<?php
include "include/tpls/footer.php";
?>