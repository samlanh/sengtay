<?php

include "init.php";






?>
    <!-- Page Content -->
    <div id="page-wrapper"><br>

            <div class="row">
                <div class="col-sm-12">
                    <?php
                    $staus1=$_SESSION['status'];
                    $user_session=$_SESSION['username'];
                    if ($staus1==1 &&$user_session){
                        echo "<br>
                    <div class='alert alert-danger'>You are user level Admin <strong>Please Login <b>Super user</b></b></strong></div>";
                    }else if ($staus1==2 && $user_session) {
                        ?>
                        <h2 class="page page-header">Super User</h2>

                        <div class="panel panel-default">
                            <form method="POST" >
                                <div class="form form-horizontal">


                                    <?php

                                        $userid=(isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0);


                                        if (isset($_POST['btn_up_sup'])) {
                                            $username = $_POST['username'];
                                            $password=empty($_POST['new_pass']) ? $_POST['password']:$password=sha1($_POST['new_pass']);

                                            $status=$_POST['status'];
                                            $phone=$_POST['phone'];
                                            $sex=$_POST['sex'];
                                            $address=$_POST['address'];

                                            $formError=array();
                                            if (empty($username)){

                                                $formError[]="<div class='alert alert-danger'>Plase input your <strong>User name login</strong> </div>";
                                            }
                                            if (empty($password)){
                                                $formError[]="<div class='alert alert-danger'>Plase input your <strong>Password</strong> </div>";
                                            }
                                            if (empty($phone)){
                                                $formError[]="<div class='alert alert-danger'>Plase input your <strong>Password</strong> </div>";
                                            }
                                            if (strlen($username)<=4){
                                                $formError[]="<div class='alert alert-danger'>Plase input your <strong>User name longer then 4 charactor</strong> </div>";
                                            }
                                            if (strlen($password)<6){
                                                $formError[]="<div class='alert alert-danger'>Plase input your <strong>password longer then 6 charactor</strong> </div>";
                                            }
                                            if(empty($formError)){


                                                $stmt=$con->prepare("UPDATE tbl_user SET u_login=?,gender_id=?,pwd=?,phone=?,status=?,Address=? WHERE u_id=?");
                                                $result=$stmt->execute(array($username,$sex,$password,$phone,$status,$address,$userid));

                                                if ($result>0){
                                                    $formError[]= "<div class='alert alert-success'>Update successfull ! <strong>User name login</strong> </div>";
                                                }else{
                                                    $formError[]= "<div class='alert alert-danger'>Can't update ! <strong>User name login</strong> </div>";
                                                }



                                            }
                                            foreach ($formError as $error){
                                                echo $error;
                                            }

                                        }

                                    ?>

                                    <?php
                                    $user=(isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0);
                                    $stmt=$con->prepare("SELECT u_id,u_login,gender_id,pwd,phone,status,Address FROM tbl_user WHERE u_id=? LIMIT 1");
                                    $stmt->execute(array($user));
                                    $result_sel=$stmt->fetch();

                                    if ($result_sel>0) {

                                        ?>
                                        <div class="panel-body">
                                            <div class="row createUser">
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">User Name</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" value="<?php echo $result_sel['u_login']?>" type="text" name="username"  placeholder="User name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row createUser">
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">User Level</label>
                                                    </div>
                                                    <div class="col-sm-4">

                                                        <select class="form-control" name="sex">
                                                            <option value="1" <?php if ($result_sel['gender_id']==1) echo "selected";?>>Male  </option>
                                                            <option value="2" <?php if ($result_sel['gender_id']==2) echo "selected";?>>Female</option>
                                                            <option value="3"<?php if ($result_sel['gender_id']==0) echo "selected";?>>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row createUser">
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">User Level</label>
                                                    </div>
                                                    <div class="col-sm-4">

                                                        <select class="form-control" name="status">
                                                            <option value="2" <?php if ($result_sel['status']==2) echo "selected";?>>Admin account </option>
                                                            <option value="1" <?php if ($result_sel['status']==1) echo "selected";?>>User account</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row createUser">
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">Password</label>
                                                    </div>
                                                    <div class="col-sm-4">

                                                        <input class="form-control" type="hidden" name="password" placeholder="Password" value="<?php echo $result_sel['pwd']?>">
                                                        <input class="form-control " type="text" name="new_pass" placeholder="Keep blank if you don't want to change password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row createUser" >
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">Phone</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" value="<?php echo $result_sel['phone']?>" name="phone" placeholder="Phone number user">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row createUser" >
                                                <div class="container">
                                                    <div class="col-sm-2">
                                                        <label class="pull-right">Address</label>
                                                    </div>
                                                    <div class="col-sm-4">

                                                        <input class="form-control" type="text" value="<?php echo $result_sel['Address']?>" name="address" placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row createUser">
                                                <div class="container">
                                                    <div class="col-sm-offset-2 col-sm-2">

                                                        <button class="btn btn-primary"  name="btn_up_sup"><i class="fa fa-pencil"></i> Update</button>


                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="panel-footer">
                                        <?php echo "Create By : ".$_SESSION['username'];?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }else {
                          header('Location:index.php');
                    }
                    ?>


                </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->
<?php
include "include/tpls/footer.php";