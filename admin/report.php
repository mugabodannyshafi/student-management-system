<?php
include('navtest.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-primary bg-light">
                    <div class="card-header text-center">
                        <div class="card-title text-uppercase text-primary">
                            <h5 class="text-muted">Get students report from date range registered</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="report.php" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="label-control">Date From:</label>
                                    <input type="text" name="start" id="datepicker" class="form-control" value="<?php if (isset($_GET['start'])) {
    echo $_GET['start'];} ?>" required>
                                </div>

                                <div class="col-md-5">
                                    <label class="label-control">Date To:</label>
                                    <input type="text" name="end" id="datepicker2" class="form-control" required value="<?php if (isset($_GET['end'])) {
    echo $_GET['end'];} ?>">
                                </div>
                            </div>
                            <div class="row  justify-content-center">
                                <div class="col-md-5 mt-3">
                                    <input type="submit" class="btn btn-primary" name="search" value="Search"></>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow mt-3 border-success">
                    <div class="card-header">
                        <h5 class="text-muted text-center text-uppercase">All students Registered
                            from <span class="text-danger bg-dark rounded-1 p-1"><?php if (isset($_GET['start'])) {
    echo $_GET['start'];}?></span> AND <span class="text-danger bg-dark rounded-1 p-1"><?php if (isset($_GET['end'])){ echo $_GET['end'];}
     ?></span> </h5>
                    </div>
                    <div class="card-body">
                        <table class=" table table-bordered table-respensive border-primary" id="table">
                            <thead class="text-primary">
                                <tr>
                                    <?php $cid=1;?>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Hobbies</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'php_search');
                            if(isset($_GET['search'])){
    $start = $_GET['start'];
    $to = $_GET['end'];

    $select = "SELECT * FROM `data` WHERE join_date BETWEEN '$start' AND '$to' order by join_date asc";
    $query_run = mysqli_query($con, $select);
    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
        //  echo $row['name'];
            ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $cid; ?></td>
                                    <td><?php echo $row['name'];  ?></td>
                                    <td><?php echo $row['hobbies'];  ?></td>
                                    <td><?php echo $row['comment'];  ?></td>

                                </tr>
                            </tbody>

                            <?php
            $cid++;
        }
    }
      else{
        ?>
                            <tr>
                                <td colspan="4" class="text-center">No Record Found</td>
                            </tr>
                            <?php
                            }
  
    }
    

?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery date timepicker -->
    <script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true
        });
    });
    </script>

    <script>
    $(function() {
        $("#datepicker2").datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true
        });
    });
    </script>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>