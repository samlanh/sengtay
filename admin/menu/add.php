<?php
include "init.php";


?>

    <!-- Page Content -->
    <div id="page-wrapper">

    <br>
<?php

if (isset($_POST['btnMenu'])){
    $txtMenu=$_POST['txtMenu'];
    $menuDes=$_POST['menuDes'];
    $ststus=$_POST['ststus'];
    $menuKeyword=$_POST['menuKeyword'];
    $formError=array();
    if (empty($txtMenu)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> menu name</strong> </div>";
    }
    if (empty($menuKeyword)){
        $formError[]="<div class='alert alert-danger'>Plase input your <strong> keyword</strong> </div>";
    }
    foreach ($formError as $error){
        echo $error;
    }
    if (empty($formError)){

       $checkmenu=checkItem("menu","tbl_menu",$txtMenu);
       // $statement=$con->prepare("SELECT $select FROM $from WHERE $select=?");

        if ($checkmenu){
            echo "<div class='alert alert-danger' style='margin: 10px -15px 10px -15px'>Menu have  <strong> $txtMenu already</strong> </div>";
        }else{
            insert($txtMenu,$menuDes,$menuKeyword,$ststus);
        }



       
        
    }
}

?>
    <!-- /.row -->
    <div class="row">
        <form method="POST">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-6">
                                    <h3 style="color: #428bca;">Create Menu</h3>
                                </div>
                                <div class="col col-sm-6">

                                    <div class="pull-right">
                                    <button  name="btnMenu" class=" btn btn-primary"><i class="fa fa-pencil"></i>  Save</button>
                                      <a href="menumanage.html" class="btn btn-danger "><i class="fa fa-backward"></i> back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-body">
                            <div class="row">
                                <div class="col col-sm-8">
                                        <div class="col col-sm-2">
                                            <label class="pull-right">Menu Name</label>
                                        </div>
                                        <div class="col col-sm-10">
                                              <input class="form form-control" type="text" name="txtMenu" placeholder="Input new menu name">
                                        </div>

                                    <div class="col col-sm-12"><br>

                                        <textarea   class="ckeditor" id="myEditor" name="menuDes" cols="35" rows="20"></textarea>


                                    </div>

                                </div>
                                <div class="col col-sm-4"">
                                    <label>Possibility</label>
                                    <select class="form form-control" name="ststus" >
                                        <option class="form form-control" value="1">Public</option>
                                        <option class="form form-control" value="0">UnPublic</option>
                                    </select><br>
                                    <label>Keyword</label>
                                    <textarea name="menuKeyword" class="form form-control" rows="5" style="width: 100%;" ></textarea>
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

