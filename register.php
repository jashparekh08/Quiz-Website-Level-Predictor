<?php
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
       <link rel="stylesheet" href="css1/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Register Now</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                            </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>
                            </div>
                            
                            <div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
                                <strong>Success!</strong>Account Registration Successfully.
                            </div>

                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                                <strong>Already Exist!</strong>This username is Already Exist.
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

<?php
if(isset($_POST["submit1"]))
{
    $count=0;
    $res=mysqli_query($link,"select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if ($count > 0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("failure").style.display="block";
        </script>
        <?php
    } else {
        mysqli_query($link,"insert into registration values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="block";
            document.getElementById("failure").style.display="none";
        </script>
        <?php
    }

}
?>


</body>

</html>