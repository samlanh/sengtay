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
                                            <h3>List user</h3>


                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
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


                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                    include "connection.php";


                                                $status=1;
                                                        $stmt = $con->prepare("SELECT * FROM tbl_user  WHERE status=? ORDER BY u_id DESC ");
                                                        $stmt->execute(array($status));
                                                        $rows = $stmt->fetchAll();
                                                        $i = '';
                                                        foreach ($rows as $row) {
                                                            $i = $i + 1;

                                                            echo "<tr class='odd gradeX'>";
                                                            echo "<td>" . $i . "</td>";
                                                            echo "<td>" . $row['u_login'] . "</td>";
                                                            echo "<td class='tblUserTr'>" . $row['phone'] . "</td>";
                                                            echo "<td class='tblUserTr'>" . $row['Address'] . "</td>";
                                                            echo "<td>user</td>";

                                                           echo "<td class='tblUserTr'>" . $row['date_register'] . "</td>";


                                                            echo "</tr>";
                                                        }

                                                ?>






                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        <!-- /.panel-body -->
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
