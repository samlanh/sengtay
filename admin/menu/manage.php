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
                                                $stmtUp=$con->prepare("UPDATE tbl_menu SET status=? WHERE menu_id=?");
                                                $result=$stmtUp->execute(array($status,$disableid));
                                                if ($result){
                                                    echo "<div class='alert alert-success'>You unblock successfull </div>";
                                                }
                                        }
                                        if (isset($_GET['publicid'])){
                                            $status=1;
                                            $publicid=$_GET['publicid'];
                                            $stmtUp1=$con->prepare("UPDATE tbl_menu SET status=? WHERE menu_id=?");
                                            $result=$stmtUp1->execute(array($status,$publicid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You public successfull </div>";
                                            }

                                        }


                                       /* */
                                        ?>




                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                       <h3 style="color: #428bca;">Manage Menu</h3>
                                                        <div class="pull-right">
                                                            <a href="menuaddmenu.html" class="btn btn-primary" style="margin-top: -70px;"><i class="fa fa-plus"> Create menu </i></a>
                                                        </div>
                                                    </div>
                                                    <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="dataTables-example">
                                                            <thead>
                                                            <tr>
                                                                <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete </button></th>
                                                                <th>No</th>
                                                                <th>Menu</th>
                                                                <th>Menu ID </th>
                                                                <th>Description</th>
                                                <!--                <th>Access</th>-->
                                                                <th>Control</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $trust=1;
                                                            $stmt=$con->prepare("SELECT * FROM tbl_menu WHERE trust ='$trust' ORDER BY menu_id DESC ");
                                                            $stmt->execute();
                                                            $rows=$stmt->fetchAll();
                                                            $i='';
                                                            foreach ($rows as  $row){
                                                                $i=$i+1;

                                                                echo "<tr class='odd gradeX'>";

                                                                echo"<td><input type='checkbox' name='del[]' value='".$row['menu_id']."' ></td>";
                                                                echo "<td>". $i."</td>";
                                                                echo "<td><a title='Click to update menu' href='menu.php?do=edit&id=".$row['menu_id']."'>".$row['menu']."</a></td>";
                                                                echo "<td class='tblUserTr'>".$row['menu_id']."</td>";
                                                                echo "<td class='tblUserTr'>".$row['description']."</td>";
                                                //                echo "<td class='tblUserTr'>".$row['Access']."</td>";

                                                                echo "<td class='center-block'>";
                                                                   if ($row['status']==1){
                                                                   echo "<a title='Click to disable this menu' href='menu.php?manage&disableid=".$row['menu_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                                                                }
                                                                if ($row['status']==0){
                                                                    echo "<a  title='Click to public menu' href='menu.php?manage&publicid=".$row['menu_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
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


                <a href="Delete.php">LInk</a>

                </form>

    <?php

if (isset($_POST['deleteSelect'])) {



    if (empty($_POST['del'])){
        echo "<div class='alert alert-danger'>Please choose your row <strong> Checked box</strong> you want to delete</div>";
    }else{

        $countDel = $_POST['del'];
        $trust=0;
        $n = count($countDel);
        for ($i = 0; $i < $n; $i++) {
            $stmt = $con->prepare("UPDATE tbl_menu set trust=:trust WHERE menu_id = :mid");
            $stmt->bindParam(':trust', $trust);
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

