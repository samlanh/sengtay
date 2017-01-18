<?php
include "init.php";


?>

    <!-- Page Content -->
    <div id="page-wrapper">

        <br>

        <!-- /.row -->
        <div class="row">
                  <div class="col-lg-12">
                           <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3>List Admin</h3>


                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">

                                                <?php

                                                    include "connection.php";
                                                        $userlevel=$_SESSION['status'];
                                                        $statusUser='';
                                                    if ($userlevel==1){
                                                        echo "<br>
                                                                    <div class='alert alert-danger'>You are user level user <strong>Please Login <b> admin account </b></b></strong></div>";
                                                    }else if ($userlevel==2) {
                                                        ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="dataTables-example">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>User Name</th>
                                                                <th>Email </th>
                                                                <th>Phone</th>
                                                                <th>Permission</th>
                                                                <th>Date Register</th>
                                                                <th>Control</th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                            <?php
                                                                            $statusUser='';
                                                                            $stmt = $con->prepare("SELECT * FROM tbl_user   ORDER BY status DESC ");
                                                                            $stmt->execute(array($userlevel));
                                                                            $rows = $stmt->fetchAll();
                                                                            $i = '';
                                                                            foreach ($rows as $row) {
                                                                                $i = $i + 1;
                                                                                $statusUser= $row['status'];
                                                                                echo "<tr class='odd gradeX'>";
                                                                                echo "<td>" . $i . "</td>";
                                                                                echo "<td>";

                                                                                          if ($statusUser==2){
                                                                                              echo $row['u_login'];
                                                                                          }elseif ($statusUser=1){
                                                                                              echo "<a title='Edit user account' href='user.php?do=edit&id=".$row['u_id']."' >" . $row['u_login'] . "</a>";
                                                                                          }
                                                                                echo         " </td>";
                                                                                echo "<td class='tblUserTr'>" . $row['phone'] . "</td>";
                                                                                echo "<td class='tblUserTr'>" . $row['Address'] . "</td>";
                                                                                echo "<td>";



                                                                                        if ($statusUser==2){
                                                                                            echo "Admin";
                                                                                        }else if ($statusUser==1){
                                                                                            echo "user";
                                                                                        }

                                                                                 echo "</td>";
                                                                               echo "<td class='tblUserTr'>" . $row['date_register'] . "</td>";

                                                                                echo "<td>";

                                                                                    if ($statusUser==2){
                                                                                        echo "<label class='btn btn-info btn-xs'>user admin</label>";
                                                                                    }elseif ($statusUser=1){
                                                                                        echo "<a title='Delete user account' href='adduser.php?do=edit&id=".$row['u_id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>";
                                                                                    }
                                                                                echo " </td>";




                                                                                echo "</tr>";
                                                                            }
                                                                            ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                               <!-- /.panel-body -->

                                                        <?php
                                                    }
                                                ?>




                            </div>
                            <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->


<?php
include "include/tpls/footer.php";
