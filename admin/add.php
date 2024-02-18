<?php include_once('navtest.php');?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP SEARCH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"
        integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap css link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-primary text-uppercase text-center">Add new Students </h4>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <label for="" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" required>
                            <label for="" class="form-label">Hobbies</label>
                            <input name="hobbies" type="text" class="form-control" required>
                            <label for="" class="form-label">Comment</label>
                            <textarea name="comment" class="form-control"></textarea>

                    </div>
                    <div class="card-footer">
                        <div class="">
                            <button name="send" class="btn btn-primary p-sm-2 w-3"><i class="fas fa-paper-plane"></i>
                                Send</button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Footer started here -->
    <div class="container-fluid" style="margin-top: 157px;">
        <div class="row">
            <div class="footer bg-dark">
                <div class="text-center">
                    <p class="text-white mt-2">&#169; Gloire 2022<?php date('y-m-y') ?></p>
                </div>
            </div>
        </div>

    </div>
</body>