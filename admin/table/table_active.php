<?php include('navtest.php') ?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./datatable/dataTable.bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-">
                <div class="card bg-dark text-white text-center">
                    <div class="card-header">
                        <div class="card-tittle text-uppercase">All Active Students Here</div>
                    </div>
                </div>
                <table class="table table-bordered table-danger" id="myTable">
                    <thead>
                        <tr>
                            <?php $cid=1;?>
                            <th>#</th>
                            <th>Name</th>
                            <th>Hobbies</th>
                            <th>Comment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php 
$con = mysqli_connect('localhost', 'root', '', 'php_search');

$select = "SELECT * FROM `data` WHERE status=1";
$query_run = mysqli_query($con, $select);
if(mysqli_num_rows($query_run)>0){
    while($row =mysqli_fetch_assoc($query_run)){
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $cid; ?>
                            </td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['hobbies'] ?></td>
                            <td><?php echo $row['comment'] ?></td>
                            <td>
                                <?php if($row['status']==1){
            echo '<p><a href="action.php?id='.$row['id'].'&status=0" class="btn btn-primary">Active</a></p>';
                                } ?>
                            </td>


                        </tr>
                    </tbody>
                    <?php
        $cid++;
    }
 
}
   else{
     ?>
                    <tr>
                        <td colspan="5" class="text-center">No Record Found</td>
                    </tr>
                    <?php
    }
?>

                </table>
            </div>
            <script>
            $(document).ready(function() {
                //inialize datatable
                $('#myTable').DataTable();
            });
            </script>
        </div>
    </div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTable.bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
<script>

</script>

</html>