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
                                            $stmtUp=$con->prepare("UPDATE tbl_article SET status=? WHERE artcle_id=?");
                                            $result=$stmtUp->execute(array($status,$disableid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You unblock successfull </div>";
                                            }
                                        }
                                        if (isset($_GET['publicid'])){
                                            $status=1;
                                            $publicid=$_GET['publicid'];
                                            $stmtUp1=$con->prepare("UPDATE tbl_article SET status=? WHERE artcle_id=?");
                                            $result=$stmtUp1->execute(array($status,$publicid));
                                            if ($result){
                                                echo "<div class='alert alert-success'>You public successfull </div>";
                                            }

                                        }

                                        ?>

                                                    <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                       <h3 style="color: #428bca;">Manage spacial</h3>


                                                        <div class="pull-right">
                                                            <a href="articleaddart.html" class="btn btn-primary" style="margin-top: -70px;"><i class="fa fa-plus"> Create article </i></a>
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
                                                                <th>IMG</th>
                                                                <th>Category</th>
                                                                <th>Category </th>
                                                                <th>New price</th>
                                                                <th>Control</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php


                                                            $stmt=$con->prepare("
                                                                      
                                                                      SELECT tbl_article.*,tbl_category.category as category FROM tbl_article INNER JOIN tbl_category
                                                                      ON tbl_article.category_id=tbl_category.category_id  WHERE  tbl_article.promotion='1' AND tbl_article.trust='1' ORDER BY article DESC
                                                                      
                                  
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
                                                                <td style="width:50px;"><img src="../img/<?php echo $row['images_pro']?>" style="max-width: 60px; max-height: 50px;" ></td>
                                                                <?php
                                                                echo "<td><a title='Click to update Article' href='article.php?do=edit&id=".$row['artcle_id']."'>".$row['article']."</a></td>";
                                                                echo "<td class='tblUserTr'>".$row['category']."</td>";
                                                             echo "<td class='tblUserTr'>".$row['new_price']."$</td>";
                                                                
                                                                echo "<td>";
                                                                if ($row['status']==1){
                                                                    echo "<a title='Click to disable this article' href='article.php?do=manage&disableid=".$row['artcle_id']."' class='btn btn-info btn-xs'><i class='fa fa-toggle-up' ></i> Public </a>";
                                                                }
                                                                if ($row['status']==0){
                                                                    echo "<a  title='Click to public article' href='article.php?do=manage&publicid=".$row['artcle_id']."' class='btn btn-warning btn-xs'> <i class='fa fa-lock' ></i> Disable</a>";
                                                                }
                                                                echo "</td>";




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
        $trust=0;
        $n = count($countDel);
        for ($i = 0; $i < $n; $i++) {
            $stmt = $con->prepare("UPDATE tbl_article SET trust=:trust WHERE artcle_id = :artcle_id");
            $stmt->bindParam(':trust', $trust);
            $stmt->bindParam(':artcle_id', $countDel[$i]);
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

