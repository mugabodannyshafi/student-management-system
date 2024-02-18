<?php require('navtest.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <!-- toastr link here -->
    <link rel="stylesheet" href="./css/toastr/toastr.css">
    <link rel="stylesheet" href="./css/toastr/toastr.min.css">
    <!-- bootstrap css link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Card started here -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="display.php" class="text-decoration-none" title="Inactive Students">
                    <div class="card bg-success text-white border-right-primary shadow-lg h-100 py-2 mt-5">
                        <div class="card-body">
                            <div class="row no-gutters text-align-center">
                                <div class="col mr-2">
                                    <?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');
$select = "SELECT * FROM `students`";
$query_run = mysqli_query($con, $select);
if($res=mysqli_num_rows($query_run)){
    ?>
                                    <h5 class="text-lg font-weight-bold text-light mb-1 text-uppercase">
                                        Total Students
                                    </h5>
                                    <div class="card-footer">
                                        <h4 class="h5 mb-0 text-center font-weight-bold text-gray-800">
                                            <?= $res ?>
                                        </h4>
                                    </div>
                                    <?php
}
?>

                                </div>
                                <div class="col-auto" style="font-size: 30px;">
                                    <i class="fas fa-people-roof text-light"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mt-5">

            </div>
        </div>


    </div>


    <!-- Footer started here -->
    <div class="container-fluid" style="margin-top: 338px;">
        <div class="row">
            <div class="footer mt-5 bg-dark">
                <div class="text-center">
                    <p class="text-white mt-2">&#169; Gloire 2022<?php date('y-m-y') ?></p>
                </div>
            </div>
        </div>

    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./"></script>
    <script>
    setTimeout(function() {
        document.getElementById("alert").style.display = "none"
    }, 3000)
    </script>
</body>

</html>