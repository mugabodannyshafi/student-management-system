<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_index.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    * {
        font-family: poppins, 'Roboto', sans-serif;
        margin: 0;
        box-sizing: border-box;
        padding: 0;
    }

    body,
    html {
        height: 100%;
        margin: 0;
    }

    body {
        background-image: linear-gradient(30deg, rgba(0, 0, 0, 0.1), #44729f), url(bg-image/well.jpg);
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        padding-top: 50px;

        /* background-image: linear-gradient(25deg, rgba(63, 94, 251, 1) 0%, rgba(71, 203, 84, 1) 100%), url(bg-image/well.jpg); */

    }

    /* h4{
        color: #ffffff;
        font-weight: 5000 !important;
        font-style: bold !important;
        background-color: #5a3622;
        padding: 20px 20px;
    }
    h6{
        color: rgb(44, 12, 12);
    } */


    .btn-primary {
        background: #4540f7 !important;
        color: #fff !important;
        border-color: #4540f7 !important;
    }

    .btn-primary:hover {
        background-color: #120bdd !important;
    }

    .card {
        margin-top: 15% !important;
        padding: 15px 15px 15px 10px;
    }

    .form-group {
        margin-bottom: 20px !important;
    }

    .form-control {
        border-radius: 0 !important;
        box-shadow: none !important;
        height: 45px !important;
    }

    .form-control:hover {
        box-shadow: none !important;
    }

    .form-control.active,
    .form-control:focus {
        box-shadow: none !important;
    }
    </style>
</head>

<body>
    <div class="bg">
        <div class="login-form-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form">
                                <div class="card-body shadow">
                                    <h4 class="text-center pb-4 text-uppercase">Students Management System</h4>
                                    <h6 class="text-center">Please Log-In According To Your Role!!</h6>
                                    <div class="container mt-5">
                                        <div class="btn-toolbar justify-content-between">
                                            <div class="btn-group">
                                                <a href="./student/login.php" class="btn btn-primary shadow-none">Log-in
                                                    As Student</a>
                                            </div>
                                            <div class="btn-group ml-5">
                                                <a href="./admin/login.php" class="btn btn-primary shadow-none">Log-in
                                                    As Admin</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>