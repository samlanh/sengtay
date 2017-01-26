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
                                           $trust=1;
                                            $disableid=$_GET['disableid'];
                                            $stmtUp=$con->prepare("UPDATE tbl_category SET status=? WHERE category_id=? AND trust=?");
                                            $result=$stmtUp->execute(array($status,$disableid,$trust));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You unblock successfull </div>";
                                            }
                                        }
                                        if (isset($_GET['publicid'])){
                                            $status=1;
                                            $publicid=$_GET['publicid'];
                                            $stmtUp1=$con->prepare("UPDATE tbl_category SET status=? WHERE category_id=?");
                                            $result=$stmtUp1->execute(array($status,$publicid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You public successfull </div>";
                                            }

                                        }

                                        ?>

                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                       <h3 style="color: #428bca;">Manage Category</h3>


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
                                                                <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Trust </button></th>
                                                                <th>No</th>
                                                                <th>icon</th>
                                                                <th>Category</th>
                                                                <th>Menu </th>
                                                                <th>Description</th>
                                                <!--                <th>Access</th>-->
                                                                <th>Control</th>

                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $stmt=$con->prepare("SELECT  tbl_category.*,tbl_menu.menu as menu FROM tbl_category INNER JOIN tbl_menu
                                                                                ON tbl_category.menu_id=tbl_menu.menu_id
 
                                                                            WHERE tbl_category.trust='1' ORDER BY category_id DESC ");
                                                            $stmt->execute();
                                                            $rows=$stmt->fetchAll();
                                                            $i='';
                                                            foreach ($rows as  $row){
                                                                $i=$i+1;

                                                                echo "<tr class='odd gradeX'>";

                                                                echo"<td><input type='checkbox' name='del[]' value='".$row['category_id']."' ></td>";
                                                                echo "<td>". $i."</td>";

                                                               ?>
                                                                <td><img src="../img/logo/<?php echo $row['icon'] ?>"style="width: 50px;height: 50px;"></td>
                                                                <?php
                                                                echo "<td><a title='Click to update Category' href='category.php?do=edit&id=".$row['category_id']."'>".$row['category']."</a></td>";
                                                                echo "<td class='tblUserTr'>".$row['menu']."</td>";
                                                                echo "<td class='tblUserTr'> <img style='width: 100px;' src='../img/banner/".$row['cat_banner']."'></td>";
                                                //                echo "<td class='tblUserTr'>".$row['Access']."</td>";

                                                                echo "<td >";
                                                                   if ($row['status']==1){
                                                                   echo "<a title='Click to disable this category' href='category.php?do=manage&disableid=".$row['category_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                                                                }
                                                                if ($row['status']==0){
                                                                    echo "<a  title='Click to public category' href='category.php?do=manage&publicid=".$row['category_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
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
        $trust=0;
        for ($i = 0; $i < $n; $i++) {
            $stmt = $con->prepare("UPDATE tbl_category set trust=:trust WHERE category_id = :catid");
            $stmt->bindParam(':trust', $trust);
            $stmt->bindParam(':catid', $countDel[$i]);
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

