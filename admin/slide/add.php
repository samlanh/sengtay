<?php
include "init.php";
?>
<div id="page-wrapper" style="padding: 15px; width: 1080px;" >
    <!--class row-->
    <div class="row">
        <form method="POST">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row" style="padding: 10px;">
                        <div class="col col-sm-6">
                            <h3 style="color: #428bca;">Create slide</h3>
                        </div>
                        <div class="col col-sm-6">

                            <div class="pull-right">
                                <button  name="btnMenu" class=" btn btn-primary"><i class="fa fa-pencil"></i>  Save</button>
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
                                <input class="form form-control" type="text" name="txtMenu" placeholder="Input slide name">
                            </div>
                            

                        </div>
                        <div class="col col-sm-3"">

                            <div class="form-group">
                                <label class="control-label col-sm-4">Order</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="status">
                                        <option value="1" selected>First slide</option>
                                        <option value="2">Second slide</option>
                                        <option value="2">Third slide</option>
                                        <option value="2">Last slide</option>

                                    </select>
                                </div>

                            </div>


                        </div>
                    <div class="col col-sm-3">
                        <input type="file" id="uploadslide">
                        </div>
                    <div class="col col-sm-12"><br>
                        <div class="slide_backend">

                            <img src="../img/logo/slide.png" style="height: 340px;margin-left: 300px ">

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