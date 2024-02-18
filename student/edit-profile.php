<?php include_once('navtest.php');?>
<?php 
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'php_search');
        
    // $session_email =  $_SESSION["email"];
    $sql = "SELECT * FROM `students`";
    $result = mysqli_query($con , $sql);

if(mysqli_num_rows($result) > 0 ){
   
    while($rows = mysqli_fetch_assoc($result) ){
        $name = $rows["name"];
        $email = $rows["email"];
        $dob = $rows["dob"];
        $gender = $rows["gender"];
    }
}
        $nameErr = $emailErr = "";
        // $name = $email = $dob = $gender = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
 
            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
                $email = "";
            }else{
                $email = $_REQUEST["email"];
            }


            if( !empty($name) && !empty($email) ){
            
                $sql_select_query = "SELECT email FROM `students` WHERE email = '$email' ";
                $r = mysqli_query($con , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql = "UPDATE  `students` SET name = '$name', email = '$email', dob = '$dob', gender= '$gender' WHERE email='$_SESSION[email]' ";
                    $result = mysqli_query($con , $sql);
                    if($result){
                        $_SESSION['email']= $email;
                header("location:profile.php");
                    //     echo "<script>
                    //     $(document).ready( function(){
                    //         $('#showModal').modal('show');
                    //         $('#modalHead').hide();
                    //         $('#linkBtn').attr('href', 'profile.php');
                    //         $('#linkBtn').text('View Profile');
                    //         $('#addMsg').text('Profile Edited Successfully!!');
                    //         $('#closeBtn').hide();
                    //     })
                    // </script>
                    // ";
                    }
                }

            }
        }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP SEARCH</title>
    <!-- bootstrap css link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    label {
        font-size: 20px;
    }

    .card-text {
        font-size: 17px;
        font-family: 'Roboto', sans-serif;
        margin-left: 10px;

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

    .form-control {
        margin-bottom: 20px;
        border-radius: 0;
        box-shadow: none;
        height: 45px;
        outline: none;
        width: 500px;
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

    .alert {
        cursor: pointer;
    }

    .login-form__footer {
        color: #505F76;
    }
    </style>
</head>

<body>
    <div class="login-form-bg h-100">
        <div class="conatiner mt-5 h-100">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class=" card card-login-form mb-0">
                            <div class="card-body shadow pt-5">
                                <h4 class="text-center">Edit Your Profile</h4>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label class="form-label">Full Name:</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                                        <?php echo $nameErr ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Email:</label>
                                        <input type="Email" class="form-control" name="email"
                                            value="<?php echo $email ?>">
                                        <?php echo $emailErr ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Date-of-Birth:</label>
                                        <input type="date" class="form-control" name="dob" value="<?php echo $dob ?>">
                                    </div>
                                    <div class="form-group form-check form-check-inline mt-2">
                                        <label class="form-check-label">Gender:</label>

                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" <?php if ($gender == "Male") {
                                                    echo "checked";} ?> value="Male">
                                            <label class="form-check-label">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" <?php if ($gender == "Female") {
                                                    echo "checked";} ?> value="Female">
                                            <label class="form-check-label">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" <?php if ($gender == "Other") {
                                                    echo "checked";}  ?> value="other">
                                            <label class="form-check-label">Other</label>
                                        </div>

                                        <div class="btn-toolbar justify-content-between mt-3" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group">
                                                <input type="submit" value="Save Changes" class="btn btn-primary w-20 "
                                                    name="save_changes">
                                            </div>
                                            <div class="input-group">
                                                <a href="profile.php" class="btn btn-primary w-20">Close</a>
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
    <!-- Footer started here -->
    <div class="container-fluid" style="margin-top: 405px;">
        <div class="row">
            <div class="footer bg-dark">
                <div class="text-center">
                    <p class="text-white mt-2">&#169; Gloire <?php echo date('Y') ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>