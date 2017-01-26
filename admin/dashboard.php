<?php

ob_start();
session_start();
if ($_SESSION['username'] && $_SESSION['status']){
    include "init.php";
    include "connection.php";


    ?>
    <div id="page-wrapper">
        <div class="row">
<?php

if (isset($_GET['disableid'])){

    $status=0;

    $disableid=$_GET['disableid'];
    $stmtUp=$con->prepare("UPDATE tbl_article SET status=? WHERE artcle_id=?");
    $result=$stmtUp->execute(array($status,$disableid));
    if ($result){
        echo "<div class='alert alert-danger' style='margin-top: 10px;'>You unblock successfull </div>";
    }
}
if (isset($_GET['publicid'])){
    $status=1;
    $publicid=$_GET['publicid'];
    $stmtUp1=$con->prepare("UPDATE tbl_article SET status=? WHERE artcle_id=?");
    $result=$stmtUp1->execute(array($status,$publicid));
    if ($result){
        echo "<div class='alert alert-success' style='margin-top: 10px;'>You public successfull </div>";
    }

}
?>
            <div class="col-lg-12">


                <h4>Dashboard</h4>

            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php

                                            $stmt=$con->prepare("SELECT * FROM tbl_user WHERE status='1' OR status='2'");
                                            $stmt->execute();
                                        $rowcount=$stmt->rowCount();
                                        echo $rowcount;
                                        ?></div>
                                    <div>Manage User!</div>
                                </div>
                            </div>
                        </div>
                        <a href="usermanage.html">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php

                                        $stmt=$con->prepare("SELECT * FROM tbl_article WHERE  trust='1' and arrival_comming='1' ");
                                        $stmt->execute();
                                        $rowcount=$stmt->rowCount();
                                        echo $rowcount;
                                        ?>
                                    </div>
                                    <div>Arrival Product </div>
                                </div>
                            </div>
                        </div>
                        <a href="articlemanage.html">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">

                                        <?php

                                        $stmt=$con->prepare("SELECT * FROM tbl_article WHERE  trust='1' and arrival_comming='0' ");
                                        $stmt->execute();
                                        $rowcount=$stmt->rowCount();
                                        echo $rowcount;
                                        ?>

                                    </div>
                                    <div>Coming Soon </div>
                                </div>
                            </div>
                        </div>
                        <a href="articlecomingsoon.html">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php

                                        $stmt=$con->prepare("SELECT * FROM tbl_article WHERE status='1' and trust='1' and promotion='1' ");
                                        $stmt->execute();
                                        $rowcount=$stmt->rowCount();
                                        echo $rowcount;
                                        ?>
                                    </div>
                                    <div>Spacial</div>
                                </div>
                            </div>
                        </div>
                        <a href="articlespacial.html">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!--//////////////////////////////////////////////////////////////////////-->

        <div class="table-responsive">
            <table class="table table-striped table-hover" >
                <thead>
                <tr>
                    <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></th>

                    <th>No</th>
                    <th>IMG</th>
                    <th>Article Arrival</th>
                    <th>Category </th>
                    <th>New price</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                <?php


                $stmt=$con->prepare("
                                                                      
                                                                      SELECT tbl_article.*,tbl_category.category as category FROM tbl_article INNER JOIN tbl_category
                                                                      ON tbl_article.category_id=tbl_category.category_id  WHERE tbl_article.trust='1' ORDER BY artcle_id DESC limit 3
                                                                      
                                  
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

                    echo"<td><input type='checkbox' name='del[]' value='".$row['artcle_id']."' ></td>";
                    echo "<td>". $i."</td>";
                    ?>
                    <td style="width:50px;"><img src="../img/<?php echo $row['images_pro']?>" style="max-width: 30px; max-height: 50px;" ></td>
                    <?php
                    echo "<td><a title='Click to update Article' href='article.php?do=edit&id=".$row['artcle_id']."'>".$row['article']."</a></td>";
                    echo "<td class='tblUserTr'>".$row['category']."</td>";
                    echo "<td class='tblUserTr'>".$row['new_price']."$</td>";

                    echo "<td>";
                    if ($row['status']==1){
                        echo "<a title='Click to disable this article' href='dashboard.php?disableid=".$row['artcle_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                    }
                    if ($row['status']==0){
                        echo "<a  title='Click to public article' href='dashboard.php?publicid=".$row['artcle_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
                    }
                    echo "</td>";




                    echo "</tr>";
                }
                ?>

                </tr>


                </tbody>
            </table>
        </div>
      <!--  //////////////////////////////////////////////////////////////////////-->

    <div class="table-responsive">
        <table class="table table-striped table-hover" >
            <thead>
            <tr>
                <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></th>

                <th>No</th>
                <th>IMG</th>
                <th>Article promotion</th>
                <th>Category </th>
                <th>New price</th>
                <th>Control</th>

            </tr>
            </thead>
            <tbody>
            <?php


            $stmt=$con->prepare(" SELECT tbl_article.*,tbl_category.category as category FROM tbl_article INNER JOIN tbl_category ON tbl_article.category_id=tbl_category.category_id  WHERE  tbl_article.promotion='1' AND tbl_article.trust='1' ORDER BY artcle_id DESC limit 3
                                                                      
                                  
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

                echo"<td><input type='checkbox' name='del[]' value='".$row['artcle_id']."' ></td>";
                echo "<td>". $i."</td>";
                ?>
                <td style="width:50px;"><img src="../img/<?php echo $row['images_pro']?>" style="max-width: 60px; max-height: 30px;" ></td>
                <?php
                echo "<td><a title='Click to update Article' href='article.php?do=edit&id=".$row['artcle_id']."'>".$row['article']."</a></td>";
                echo "<td class='tblUserTr'>".$row['category']."</td>";
                echo "<td class='tblUserTr'>".$row['new_price']."$</td>";

                echo "<td>";
                if ($row['status']==1){
                    echo "<a title='Click to disable this article' href='dashboard.php?&disableid=".$row['artcle_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                }
                if ($row['status']==0){
                    echo "<a  title='Click to public article' href='dashboard.php?&publicid=".$row['artcle_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
                }
                echo "</td>";




                echo "</tr>";
            }
            ?>

            </tr>


            </tbody>
        </table>
    </div>
        <!--  ////////////////////////////////////////////////////////////////////////////////////////////////-->


        <div class="table-responsive">
            <table class="table table-striped table-hover" >
                <thead>
                <tr>
                    <th>  <button name="deleteSelect" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></th>

                    <th>No</th>
                    <th>IMG</th>
                    <th>Article Coming soon</th>
                    <th>Category </th>
                    <th>New price</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                <?php


                $stmt=$con->prepare("
                                                                      
                                                                      SELECT tbl_article.*,tbl_category.category as category FROM tbl_article INNER JOIN tbl_category
                                                                      ON tbl_article.category_id=tbl_category.category_id  WHERE  tbl_article.arrival_comming='0' AND tbl_article.trust='1' ORDER BY artcle_id DESC limit 3
                                                                      
                                  
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

                    echo"<td><input type='checkbox' name='del[]' value='".$row['artcle_id']."' ></td>";
                    echo "<td>". $i."</td>";
                    ?>
                    <td style="width:50px;"><img src="../img/<?php echo $row['images_pro']?>" style="max-width: 60px; max-height: 30px;" ></td>
                    <?php
                    echo "<td><a title='Click to update Article' href='article.php?do=edit&id=".$row['artcle_id']."'>".$row['article']."</a></td>";
                    echo "<td class='tblUserTr'>".$row['category']."</td>";
                    echo "<td class='tblUserTr'>".$row['new_price']."$</td>";

                    echo "<td>";
                    if ($row['status']==1){
                        echo "<a title='Click to disable this article' href='dashboard.php?&disableid=".$row['artcle_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                    }
                    if ($row['status']==0){
                        echo "<a  title='Click to public article' href='dashboard.php?&publicid=".$row['artcle_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
                    }
                    echo "</td>";




                    echo "</tr>";
                }
                ?>

                </tr>


                </tbody>
            </table>
        <!--  ////////////////////////////////////////////////////////////////////////////////////////////////-->

























      <!--  ////////////////////////////////////////////////////////////////////////////////////////////////-->
    </div>

    <?php
    include "include/tpls/footer.php";





}else{
    header('Location:index.html');
    exit();
}
ob_end_flush();

?>
