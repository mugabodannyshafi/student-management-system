<!-- PHP SCRIPT START -->
<?php

$email_error = $password_error = $login_error = "";
$email = $password = "";

if(isset($_POST["signin"]))
{
    if(empty($_POST["email"])){
        $email_error = "<p style='color:red; font-size:14px;margin-top:4px'>* Username Can Not Be Empty</p>";
    }
    else{
      $email = $_POST["email"];
    }
    if(empty($_POST["password"])){
        $password_error = "<p style='color:red; font-size:14px;'>* Password Can Not Be Empty</p>";
    }
    else{
        $password = $_POST["password"];
    }
    $_SESSION['status'] = false;
    if( !empty($email) && !empty($password)){
        
        // Database Connection 
        $con = mysqli_connect('localhost', 'root', '', 'php_search');

        $sql = "SELECT * FROM `students` WHERE email='$email' && password='$password'";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result)>0){
            while($row =mysqli_fetch_assoc($result)){
                // Session start here
                session_start();
                session_unset();
                $_SESSION['email'] = $row['email'];
                $_SESSION['status'] = true;
                header("Location:index.php?login-success");
            }
        }
        else{
            $login_error = "<div class='alert alert-danger alert-dismissible fade show'>
            <strong>Invalid Useraname/Password</strong>
            <button type='button' class='close' data-dismiss='alert'>
            <span aria-hidden='true'>&times</span>
            </button>
            </div>";
        }
    }
}
// Php script end

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- <link rel="stylesheet" href="../style/style_index.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        text-decoration: none;

    }

    body,
    html {
        height: 100%;
    }

    body {
        background-image: url(../bg-image/well.jpg);
        background-position: center;
        background-size: cover;
        height: 100%;
    }

    .btn-primary {
        background: #4540f7;
        color: #fff;
        border-color: #4540f7;
    }

    .btn-primary:focus,
    .btn-primary:hover {
        background: #4540f7;
        color: #fff;
        border-color: #4540f7;
        box-shadow: none;
    }

    .card {
        margin-top: 30%;
    }

    .form-control {
        margin-bottom: 20px;
        border-radius: 0;
        box-shadow: none;
        height: 45px;
    }

    .form-control:hover {
        box-shadow: none;
        border-bottom: 1px solid #4540f7;
    }

    .form-control:active,
    .form-control:focus {
        box-shadow: none;
        border-bottom: 1px solid #4540f7;
    }

    label {
        color: #505F76;
        font-size: 15px;

    }

    .login-form__footer {
        color: #505F76;
        cursor: pointer;
    }

    a:hover {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0 mt-5">
                                <div class="card-body pt-5 shadow">
                                    <h5 class="text-center">Hello, Student</h5>
                                    <?php echo $login_error ?>
                                    <div class="my-3">
                                        <form action="" method="POST" autocomplete="off">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>

                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <!-- 
                                            <div class="form-group">
                                                <label>Confirm Password:</label>
                                                <input type="passoword" class="form-control">
                                            </div> -->

                                            <div class="form-group"></div>

                                            <input type="submit" class="btn btn-primary w-100 shadow-none"
                                                value="Log-in" name="signin">
                                    </div>


                                    <div class="btn-toolbar justify-content-between">
                                        <div class="btn-group">
                                            <p class="login-form__footer pt-2"> Not a Student? <a
                                                    href="../admin/login.php" class="text-primary">Log-In</a> as Admin
                                                Now</p>
                                        </div>
                                        <div class="btn-group ml-5">
                                            <a class="login-form__footer pt-2" href="./reset-password.php">Forgot
                                                password</a>
                                            <!-- <a href="#" class=""></a> -->
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>