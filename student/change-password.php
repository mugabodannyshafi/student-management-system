<?php include_once('navtest.php');?>

<?php
$old_passError = $new_passErr = $confirm_passError = $changed= "";
  $old_pass = $new_pass = $confirm_pass = "";
  ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');

  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_REQUEST["old_pass"])){
        $old_passErr = "<p style='color:red;'>* Old Password Required</p>";
    }
    else{
        $old_pass =trim( $_REQUEST["old_pass"]);
    }
    if(empty($_REQUEST["new_pass"])){
        $new_passErr = "<p style='color:red;'>* New Password Required</p>";
    }
    else{
         $new_pass =trim( $_REQUEST["new_pass"]);
    }
    if(empty($_REQUEST["confirm_pass"])){
        $confirm_passErr =  "<p style='color:red;'>* New Password Required</p>";
    }
    else{
  $confirm_pass =trim( $_REQUEST["confirm_pass"]);
    }

    if(!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass)){
        $old_pass_test = "SELECT password FROM `students` WHERE email = '$_SESSION[email]' && password='$old_pass'";
        $result = mysqli_query($con, $old_pass_test);
        if(mysqli_num_rows($result)>0){
            if($new_pass === $confirm_pass){
                $change_pass = "UPDATE `students` SET password='$new_pass' WHERE email = '$_SESSION[email]'";
                if(mysqli_query($con,$change_pass)){
                    session_unset();
                    session_destroy();
                    $changed = "<p class='alert pass_change' onclick='this.remove()' id='alert' role='alert'>Password changed successfully</p>";
                }
            }
            else{
  $changed = "<p class='alert pass_change'  onclick='this.remove()' id='alert' role='alert'>Passowrd Dont Match</p>";
            }
        }
        else{
              $changed = "<p class='alert pass_change'  onclick='this.remove()' id='alert' role='alert'>Incorrect Old Password</p>";
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

    .pass_change {
        background-color: #4540f7;
        color: #ffff;
        padding: 15px;
        font-size: 16px;
        font-weight: 500;
        margin-top: 2px;
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
                                    <div class="text-center">
                                        <?php echo $changed; ?>
                                    </div>
                                    <h4 class="text-center">Change Password</h4>
                                    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label>Old Password : </label>
                                            <input type="password" name="old_pass" class="form-control">
                                            <?php echo $old_passError; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password : </label>
                                            <input type="password" name="new_pass" class="form-control">
                                            <?php echo $new_passErr; ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password : </label>
                                            <input type="password" name="confirm_pass" class="form-control">
                                            <?php echo $confirm_passError; ?>

                                        </div>

                                        <div class="btn-toolbar justify-content-between" role="toolbar"
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
    <script>
    // setTimeout((function) => {
    //     document.getElementById('#alert').style.display='none';
    // }, timeout);

    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000)
    </script>
</body>

</html>