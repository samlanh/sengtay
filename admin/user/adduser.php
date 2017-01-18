<?php

include "init.php";

?>
    <!-- Page Content -->
    <div id="page-wrapper"><br>

        <?php

        $status_user=$_SESSION['status'];

        if ($status_user==1){
            echo "<br>
                <div class='alert alert-danger'>You can't create user level Admin <strong>Please Login <b>Super user</b></b></strong></div>";
        }else if ($status_user==2){

            if (isset($_POST['btnUserAdmin'])) {
                $username = $_POST['username'];
                $sex=$_POST['sex'];
                $password=$_POST['password'];
                $enPass=sha1($password);
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $status=$_POST['status'];


                $formError=array();
                if ($sex==0){
                    $formError[]="<div class='alert alert-danger'>Plase Select your<strong>Sex</strong> </div>";
                }

                if (empty($username)){

                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>User name login</strong> </div>";
                }
                if ($status==0){
                    $formError[]="<div class='alert alert-danger'>Plase Select <strong>Level user</strong> </div>";
                }
                if (empty($password)){
                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>Password</strong> </div>";
                }
                if (empty($phone)){
                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>Phone</strong> </div>";
                }
            /*    if (empty($address)){
                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>address</strong> </div>";
                }*/
                if (strlen($username)<4){
                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>User name longer then 4 charactor</strong> </div>";
                }
                if (strlen($password)<6){
                    $formError[]="<div class='alert alert-danger'>Plase input your <strong>password longer then 8 charactor</strong> </div>";
                }
                if(empty($formError)){
                   $check= checkItem("u_login","tbl_user",$username);
                    if ($check){
                        $formError[]="<div class='alert alert-danger'><strong>Create Fail $username </strong> User have already  </div>";
                    }
                    else{

                       // $stmt=add_user("tbl_user","u_login,gender_id,pwd,phone,status,Address,date_register",":zulog,:zgender_ID,:zpwd,:zPhone,:zstatus,:zaddress,now()");
                        $stmt=$con->prepare("INSERT INTO tbl_user(u_login,gender_id,pwd,phone,status,Address,date_register)
                                            VALUES (:zulog,:zgender_ID,:zpwd,:zPhone,:zstatus,:zaddress,now())
                                            ");
                        $result=  $stmt->execute(array(
                            'zulog'=>$username,
                            'zgender_ID'=>$sex,
                            'zpwd'=>$enPass,
                            'zPhone'=>$phone,
                            'zstatus'=>$status,
                            'zaddress'=>$address

                        ));

                        if ($result){
                            $formError[]= "<div class='alert alert-success'> <strong>Create successfull !</strong> User name login</div>";

                        }else{
                            $formError[]= "<div class='alert alert-danger'> <strong>Fail</strong> Create fail $username</div>";

                        }
                    }
                }
                foreach ($formError as $error){
                    echo $error;
                }

            }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page page-header">Admin create user</h2>
                </div>

                <div class="panel panel-default">
                    <form method="POST" >
                        <div class="form form-horizontal">
                            <div class="panel-body">
                                <div class="row createUser">
                                    <div class="container">
                                        <div class="col-sm-2">
                                            <label class="pull-right">User Name</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="username" placeholder="User name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row createUser">
                                    <div class="container">
                                        <div class="col-sm-2">
                                            <label class="pull-right">Gender</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="sex" class="form-control" >
                                                <option value="0">Please select Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
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
                                                <option value="0">Select level user</option>
                                                <option value="2">Administrator</option>
                                                <option value="1" selected>User</option>
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
                                            <input class="form-control" type="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row createUser" >
                                    <div class="container">
                                        <div class="col-sm-2">
                                            <label class="pull-right">Phone</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="phone" placeholder="Phone number user">
                                        </div>
                                    </div>
                                </div>
                                <div class="row createUser" >
                                    <div class="container">
                                        <div class="col-sm-2">
                                            <label class="pull-right">Address</label>
                                        </div>
                                        <div class="col-sm-4">

                                            <input class="form-control" type="text" name="address" placeholder="Address">
                                        </div>
                                    </div>
                                </div>


                                <div class="row createUser">
                                    <div class="container">
                                        <div class="col-sm-offset-2 col-sm-2">
                                            <input type="submit" class="btn btn-primary"  name="btnUserAdmin" value="Create">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php echo "Create By : ".$_SESSION['username'];?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }

        ?>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->
<?php
include "include/tpls/footer.php";