<?php include "../admin/lib/session.php";
Session::check_login();
 ?>


<?php include "../admin/config/config.php" ?>
<?php include "../admin/helpers/formate.php" ?>
<?php include "../admin/lib/database.php" ?>
<?php 
 $db = new Database();
 $frmt = new formate();

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/css/login.css">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <div class="log_wrap">
                    <h2 class="text-center">Admin Login</h2>

                <form action="admin_login.php" method="post">
                    <div class="imgcontainer">
                        <img src="../admin/image/img_avatar2-3.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <input  type="submit" class="btn btn-success btn-block" name="login" value="Login" />
                        
                    </div>
                </form>
                </div> 
            </div>
        </div>
    </div>

    

</body>
</html>

<?php 
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw = md5($psw);

    $select_query = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_pass = '$psw' ";
    $reslt = $db->select($select_query);
    if ($reslt) {
        $row = mysqli_fetch_array($reslt);

        Session::set_session("admin_login", true);
        Session::set_session("adminName", $row['admin_name']);
        Session::set_session("adminEmail", $row['admin_email']);
        header("Location:index.php");
    }else{
        echo '<script type="text/javascript">Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Email or Password Wrong",
                            })
                            setTimeout(function(){
            window.location.href = "admin_login.php";
         }, 2000);
                        </script>';
                    
    }
}





 ?>