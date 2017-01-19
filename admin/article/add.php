<?php
include "init.php";
?>
    <div id="page-wrapper" style="padding: 15px; width: 1100px;" >
      <form method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="row" style="margin: 10px">
              <div class="col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="control-label col-sm-1" for="email">Title</label>
                          <div class="col-sm-11">
                              <input type="email" class="form-control" id="email" placeholder="Title...">
                          </div>
                       </div>


                  <div class="form-group">
                      <label class="control-label col-sm-1" for="email">code</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="email" placeholder="code">
                      </div>
                      <label class="control-label col-sm-1" for="email">Price</label>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control" placeholder="Old Price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group">

                              <input type="number" class="form-control" placeholder="New price" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1">$</span>
                          </div>
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
                              <label class="control-label col-sm-3" >images</label>
                              <div class="box_img" ><img id="images" src="../img/pp.png" style="height: 100px; width: 150px;"></div>

                              <input id="fileUpload" style="display: none;" class="input-group" type="file" name="user_image1234" accept="image/*" />
                          </div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-body">


                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Menu</label>
                              <div class="col-sm-9">
                                  <select class="form-control">
                                      <option>-select-</option>
                                      <option>.Public</option>
                                      <option>.Disable</option>

                                  </select>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Category</label>
                              <div class="col-sm-9">
                                  <select class="form-control">
                                      <option>-select-</option>
                                      <option>.Public</option>
                                      <option>.Disable</option>

                                  </select>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Status</label>
                              <div class="col-sm-9">
                                  <select class="form-control">
                                      <option>-select-</option>
                                      <option>.Public</option>
                                      <option>.Disable</option>

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

                          <button class="btn btn-success" id="btnAdd">Save</button>

                      </div>
                  </div>

              </div>

          </div>
      </form>
    </div>

<?php
include "include/tpls/footer.php";
?>