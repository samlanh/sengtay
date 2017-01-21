<?php
include "init.php";
?>
 <!-- Page Content -->
    <div id="page-wrapper">

    <br>
            <form method="post">

                                <!-- /.row -->
                                <div class="row">
                                        <div class="col-lg-12">
                                        <?php

                                        if (isset($_GET['disableid'])){

                                            $status=0;
                                            $disableid=$_GET['disableid'];
                                            $stmtUp=$con->prepare("UPDATE tbl_slide SET status=? WHERE slide_id=?");
                                            $result=$stmtUp->execute(array($status,$disableid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You unblock successfull </div>";
                                            }
                                        }
                                        if (isset($_GET['publicid'])){
                                            $status=1;
                                            $publicid=$_GET['publicid'];
                                            $stmtUp1=$con->prepare("UPDATE tbl_slide SET status=? WHERE slide_id=?");
                                            $result=$stmtUp1->execute(array($status,$publicid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You public successfull </div>";
                                            }

                                        }

                                        ?>

                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                       <h3 style="color: #428bca;">Manage article</h3>


                                                        <div class="pull-right">
                                                            <a href="categoryaddcat" class="btn btn-primary" style="margin-top: -70px;"><i class="fa fa-plus"> Create Category </i></a>
                                                        </div>
                                                    </div>
                                                    <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="dataTables-example">
                                                            <thead>
                                                            <tr>
                                                                <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></th>

                                                                <th>No</th>
                                                                <th style="width: 120px;">IMG</th>
                                                                <th>Category</th>
                                                                <th>Category </th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php


                                                            $stmt=$con->prepare("
                                                                      
                                                                      SELECT * FROM tbl_slide  ORDER BY slide_id DESC
                                                                      
                                  
                                                              ");


                                                         /*   $stmt=$con->prepare("SELECT  tbl_article.*,tbl_menu.menu as menu FROM tbl_article INNER JOIN tbl_menu
                                                                                ON tbl_article.artcle_id=tbl_menu.menu_id

                                                                              ORDER BY article DESC ");*/
                                                            $stmt->execute();
                                                            $rows=$stmt->fetchAll();
                                                            $i='';
                                                            foreach ($rows as  $row){
                                                                $i=$i+1;

                                                                echo "<tr class='odd gradeX'>";

                                                                echo"<td><input type='checkbox' name='del[]' value='".$row['slide_id']."' ></td>";
                                                                echo "<td>". $i."</td>";
                                                              ?>
                                                                <td ><img src="../img/slide/<?php echo $row['slide_image']?>" style="width: 100px; height: 35px; " ></td>
                                                                <?php
                                                                echo "<td><a title='Click to update slide' href='slide.php?do=edit&id=".$row['slide_id']."'>".$row['slide_tile']."</a></td>";

                                                                echo "<td >";
                                                                   if ($row['status']==1){
                                                                   echo "<a title='Click to disable this article' href='slide.php?do=manage&disableid=".$row['slide_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                                                                }
                                                                if ($row['status']==0){
                                                                    echo "<a  title='Click to public slide' href='slide.php?do=manage&publicid=".$row['slide_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
                                                                }
                                                                echo" </td>";
                                                                echo "</tr>";
                                                            }
                                                            ?>

                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>

                                    <?php
                                    if (isset($_GET['id']))
                                        ?>

                                        <!-- /.table-responsive -->
                                        <!--<div class="well">
                                            <h4>DataTables Usage Information</h4>
                                            <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                        </div>-->
                                        </div>
                                        <!-- /.panel-body -->
                                        </div>
                                        <!-- /.panel -->
                                        </div>
                                        <!-- /.col-lg-12 -->
                                </div>
                                <!-- /.row -->









                </form>

    <?php

if (isset($_POST['deleteSelect'])) {



    if (empty($_POST['del'])){
        echo "<div class='alert alert-danger'>Please choose your row <strong> Checked box</strong> you want to delete</div>";
    }else{

        $countDel = $_POST['del'];
        $n = count($countDel);
        for ($i = 0; $i < $n; $i++) {
            $stmt = $con->prepare("DELETE FROM 	tbl_menu WHERE menu_id = :mid");
            $stmt->bindParam(':mid', $countDel[$i]);
            $stmt->execute();

            echo $countDel[$i];

        }
    }?>
    <script type="text/javascript">
        window.location.href=window.location.href
    </script>
    <?php

}
    ?>



    </div>
    <!-- /#page-wrapper -->

    <?php
include "include/tpls/footer.php";

