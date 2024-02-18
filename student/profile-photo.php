<?php require('navtest.php'); ?>

<?php 
// database connection
$con = mysqli_connect('localhost', 'root', '', 'php_search');

if(isset($_POST['save_changes'])){
    $filename = $_FILES['dp']['name'];
    $filetemp = $_FILES['dp']['tmp_name'];
    $temp_ex = explode(".", $filename);
    $extension = strtolower(end($temp_ex));
    $allowed_types = array("jpg", "png", "jpeg");

    if(in_array($extension,$allowed_types)){
        $new_file_name = uniqid("", true) . $filename;
        $location = "uploaded/" . $new_file_name;

        if(move_uploaded_file($filetemp,$location)){
            $sql = "UPDATE `students` SET `dp`='$new_file_name' WHERE email='$_SESSION[email]'";
            $result = mysqli_query($con, $sql);

            if($result){
                header("Location:profile.php");
            }
            else{
                echo "<script>alert('Only JPEG PNG and JPG are allowed')</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;

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
    </style>
</head>

<body>
    <div style="margin-top:100px">
        <div class="login-form-bg h-100">
            <div class="container mt-5 h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5 shadow">
                                    <h4 class="text-center">Change Profile photo</h4>
                                    <form method="POST" enctype="multipart/form-data"
                                        action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label>Select Image : </label>
                                            <input type="file" name="dp" class="form-control shadow-none">

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
                                    </form>
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