<?php
include "../connection.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="color:white">
                    Admin Login
                </div>
                <div class="login-form">
                    <form name="form1" action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                                <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                                <div class="alert alert-danger" id="errormsg" style="margin-top: 10px; display: none" >
                                    <strong>Invalid!</strong> Invalid username Or Password
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php
if(isset($_POST["submit1"]))
{
    $count = 0;
    $username = mysqli_real_escape_string($link,$_POST["username"]);
    $password = mysqli_real_escape_string($link,$_POST["password"]);

    $res = mysqli_query($link,"select * from admin_login where username = '$username' && password='$password'");
    $count=mysqli_num_rows($res);

    if($count==0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("errormsg").style.display="block";
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            window.location="demo.php";
        </script>
        <?php
    }
}
?>
