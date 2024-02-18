<?php include_once('navtest.php');?>
<?php 
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'php_search');

$sql = "SELECT * FROM `students` WHERE email='$_SESSION[email]'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
    while($row =mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $id = $row['id'];
        $dp = $row['dp'];

        if(empty($gender)){
            $gender = "Not Defined";
        }
        else{
            $dob = date('D, F j, Y', strtotime($dob));
        }
        if(empty($dob)){
            $dob = "Not Defined";
            $age = "Not Defined";
        }
        else{
            $date1 = date_create($dob);
            $date2 = date_create("now");
            $diff = date_diff($date1, $date2);
            $age = $diff->format("%Y");
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
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="card shadow" style="width:22rem;">
                    <img src="uploaded/<?php if (!empty($dp)) {
                        echo $dp;
                    } else {
                        echo "1.jpg";} ?>" class="rounded img-fluid card-img-top"
                        style="height: 250px; border-radius: 50%; " alt="...>
                    <div class= " card-body">
                    <h4 class="text-center mb-4"><?php echo $name; ?></h4>
                    <p class="card-text">Email:&nbsp; <?php echo $email; ?></p>
                    <p class="card-text">Student Id:&nbsp; <?php echo $id; ?></p>
                    <p class="card-text">Email:&nbsp; <?php echo $email; ?></p>
                    <p class="card-text">Gender:&nbsp; <?php echo $gender; ?></p>
                    <p class="card-text">Date Of Birth:&nbsp; <?php echo $dob; ?></p>
                    <p class="card-text">Age:&nbsp; <?php echo $age; ?></p>

                    <p class="text-center">
                        <a href="edit-profile.php" class="btn btn-outline-primary">Edit Profile</a>
                        <a href="change-password.php" class="btn btn-outline-primary">Change Password</a>
                        <a href="profile-photo.php" class="btn btn-outline-primary mt-2">Change Profile Picture</a>
                    </p>
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