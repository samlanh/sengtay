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
                                            $stmtUp=$con->prepare("UPDATE tbl_link_footer SET status=? WHERE link_footer_id=?");
                                            $result=$stmtUp->execute(array($status,$disableid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You unblock successfull </div>";
                                            }
                                        }
                                        if (isset($_GET['publicid'])){
                                            $status=1;
                                            $publicid=$_GET['publicid'];
                                            $stmtUp1=$con->prepare("UPDATE tbl_link_footer SET status=? WHERE link_footer_id=?");
                                            $result=$stmtUp1->execute(array($status,$publicid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You public successfull </div>";
                                            }

                                        }

                                        ?>

                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                       <h3 style="color: #428bca;">Manage item footer</h3>


                                                        <div class="pull-right">
                                                            <a href="footercataddcatfooter.html" class="btn btn-primary" style="margin-top: -70px;"><i class="fa fa-plus"> Create footer category </i></a>
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
                                                                <th>Item footer </th>
                                                                <th>Category Footer</th>
                                                                <th>Order</th>
                                                                <th>Control </th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $stmt=$con->prepare("SELECT tbl_link_footer.*,tbl_footer_cat.footer_title as cattile1
                                                                  FROM tbl_link_footer INNER JOIN 
                                                                  tbl_footer_cat
                                                                  ON tbl_link_footer.footer_cat_id=tbl_footer_cat.footer_cat_id
                                                                 WHERE tbl_link_footer.trust ='1' ORDER BY tbl_link_footer.orderList ASC");
                                                            $stmt->execute();
                                                            $rows=$stmt->fetchAll();
                                                            $i='';
                                                            foreach ($rows as  $row){
                                                                $i=$i+1;

                                                                echo "<tr class='odd gradeX'>";

                                                                echo"<td><input type='checkbox' name='del[]' value='".$row['link_footer_id']."' ></td>";
                                                                echo "<td>". $i."</td>";
                                                                echo "<td><a title='Click to update item footer' href='itemfooter.php?do=edit&id=".$row['link_footer_id']."'>".$row['linkFooter']."</a></td>";
                                                                echo "<td>".$row['cattile1']."</td>";
                                                                echo "<td>".$row['orderList']."</td>";
                                                                echo "<td class='center-block'>";
                                                                   if ($row['status']==1){
                                                                   echo "<a title='Click to disable this item footer' href='itemfooter.php?do=manage&disableid=".$row['link_footer_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                                                                }
                                                                if ($row['status']==0){
                                                                    echo "<a     title='Click to public item footer' href='itemfooter.php?do=manage&publicid=".$row['link_footer_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
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

