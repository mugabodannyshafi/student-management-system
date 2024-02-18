<?php include_once('navtest.php');?>
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
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center text-primary">PHP SEARCH</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" required name="search" placeholder="Search Here"
                                    value="<?php if(isset($_GET['search'])){
    echo $_GET['search'];
                                    } ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="card mt-4">
                    <div class="card-header text-center">
                        <h4 class="text-primary">Data From Database Here</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Hobbies</th>
                                    <th>Comment</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $con = mysqli_connect('localhost', 'root', '', 'php_search');
                                if(isset($_GET['search'])){
    $values = $_GET['search'];
    $select = "SELECT * FROM `data` WHERE CONCAT(id,name,hobbies,comment) LIKE '%$values%'" or die('query failed');

    $query_run = mysqli_query($con, $select);

    if(mysqli_num_rows($query_run) > 0 ){
        foreach($query_run as $row){
            ?>

                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['hobbies']?></td>
                                    <td><?php echo $row['comment']?></td>
                                </tr>
                                <?php
        }
    }
 

                                }
                                   else{
        ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Record Found</td>
                                </tr>
                                <?php
    }
                             
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="card mt-3">
                    <?php
if(isset($_GET['message'])):?>
                    <div class="alert alert-success text-center" id="alert" role="alert">
                        <?php
if($_GET['message']=='successadd'){
    echo "Added Successfully";
}
    ?>
                    </div>
                    <?php endif ?>


                    <div class="card-header">
                        <h4 class="text-center text-primary">Select Student Status</h3>
                    </div>
                    <div class="card-body text-center">
                        <!-- <a href="add.php" class="btn btn-primary p-sm-2">Add New</a> -->
                        <select name="select" data-bs-toggle="select" data-bs-target="select" class="form-control">
                            <option selected disabled class="text-center">--select students status--</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer started here -->
    <div class="container-fluid">
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
    <script>
    setTimeout(function() {
        document.getElementById("alert").style.display = "none"
    }, 3000)
    </script>
</body>

</html>