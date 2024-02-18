<?php
$con =mysqli_connect('localhost','root','','php_search');
$pass = "";
if(isset($_POST['reset'])){
    $email = $_POST['email'];
    

    $sql ="SELECT * FROM `students` WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
       while($rows = mysqli_fetch_assoc($result)){
            $pass = "<div class='alert alert-success'>Your password is" . $rows['password'] . "</div>";
       }
      
            
    }
     else{
         $pass = "<div class='alert alert-success'>Invalid</div>";
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
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }

    body {
        background: linear-gradient(20deg, rgba(0, 0, 0, 0.1), #44729f), url(../bg-image/well.jpg);
        background-position: center;
        background-size: cover;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .container {
        background-color: #fff;
        padding: 30px 20px;
        border-radius: 5px;
        box-shadow: 0 1.25em 2.18em rgba(6, 78, 51, 0.3);
        width: 500px;
        height: 350px;
        margin-top: 5%;

    }

    .top {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 18px;
        text-transform: uppercase;
        text-align: center;

    }

    .body {
        margin-bottom: 30px;
        margin-top: 60px;
    }

    label {
        font-size: 16px;
        color: #505F76;


    }

    .input {
        height: 40px;
        width: 100%;
        outline: none;
        border: 1px solid #4540f7;
        padding: 10px 20px;
        margin-top: 7px;
        font-size: 1.0em;
        color: #505F76;
    }

    ::-webkit-input-placeholder {
        font-size: 16px;
        color: #505F76;

    }

    .reset-button {
        width: 100%;
        padding: 10px 10px;
        background-color: #4540f7;
        color: #fff;
        font-size: 18px;
        border: none;
        outline: none;
        cursor: pointer;
        transition: 1s;
        border-radius: 5px;
        font-weight: 500;

    }

    .reset-button:hover {
        background-color: #150df1;
    }

    .footer2 {
        margin-top: 10px;

    }

    .cancel-button {
        width: 100%;
        padding: 10px 10px;
        background-color: #150df1;
        color: #fff;
        font-size: 18px;
        border: none;
        outline: none;
        cursor: pointer;
        transition: 1s;
        border-radius: 5px;
        font-weight: 500;
    }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <div class="top">
                <h4?>Reset Your Password</h4>
                    <?php echo $pass ?>
            </div>
            <div class="body">
                <label for="input">Enter your email</label>
                <input type="text" class="input" placeholder="example@gmail.com" name="email">
            </div>
            <div class="footer">
                <input type="submit" value="Reset Password" class="reset-button" name="reset">
            </div>

            <div class="footer2">
                <a href="login.php">
                    <input type="submit" value="Cancel" class="cancel-button"></a>
            </div>
        </div>
    </form>
</body>

</html>