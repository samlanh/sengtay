<?php
    include "include/tpls/header.php";
    include "connection.php";
session_start();
$noNavbar='';
$pageTitle='Login';

/*if(isset($_SESSION['username'])){
    header('Location:dashboard.php');//Redirectory to dashboard page
}*/


// Check user if user coming from FTTP POst request
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $hashaPass=sha1($password);

    // echo $hashaPass;
    // Check if user exist Database
    $userLevel=1;
    $superLevel=2;
    $stmt=$con->prepare("SELECT 

                                  u_id,u_login,pwd,status
                            FROM  
                                  tbl_user 
                            WHERE 
                                  u_login=? 
                            AND    
                                  pwd=? 
                            AND 
                                (status=? OR status=?)
                            LIMIT 1 " );
    $stmt->execute(array($username,$hashaPass,$userLevel,$superLevel));
    $row=$stmt->fetch();
    $rowCount=$stmt->rowCount();
    if ($rowCount>0){

        $_SESSION['username']=$username;
        $_SESSION['ID']=$row['u_id'];
        $_SESSION['status']=$row['status'];
        header('Location:dashboard.html');

        exit();
    }else{

        echo "no user";
    }

}


?>

    <div class="container">
        <form class="form-horizontal frmLogin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
           <!-- <h2 style="text-align: center">Welcome to Seng Tay</h2>-->
            <div class="panel panel-primary">
                <div class="panel panel-heading headingLogin">Login</div>
                <div class="panel panel-body bodyLogin">
                    <label class="marginLogin">User name</label>
                    <input class="form-control marginLogin " type="text" name="user" placeholder="User name" autocomplete="off" autofocus/>
                    <label class="marginLogin">User Password</label>
                    <input class="form-control marginLogin"type="password" name="pass" placeholder="Password" autocomplete="new-password"/>
                    <input class="class="marginLogin"" type="checkbox" name="remember"> Remember<br>
                    <button class="btn btn-success marginLogin" style="width: 100%">      Login     </button>

                </div>

            </div>
        </form>
    </div>


<?php
    include "include/tpls/footer.php";

?>