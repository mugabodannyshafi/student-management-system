<?php
include('navtest.php');
$con = mysqli_connect('localhost', 'root', '', 'php_search');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inactive students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-">
                <div class="card bg-dark text-white text-center">
                    <div class="card-header">
                        <div class="card-tittle text-uppercase">All Inactive Students Here</div>
                    </div>
                </div>
                <table class="table table-bordered table-danger">
                    <thead>
                        <tr>
                            <?php $cid=1; ?>
                            <th>#</th>
                            <th>Name</th>
                            <th>Hoobies</th>
                            <th>Comment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php 
$select = "SELECT * FROM `data` WHERE status=0";
$query_run = mysqli_query($con, $select);
if(mysqli_num_rows($query_run)>0){
    while($row =mysqli_fetch_assoc($query_run)){
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $cid ?>

                            </td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['hobbies'] ?></td>
                            <td><?php echo $row['comment'] ?></td>
                            <td>
                                <?php if($row['status']==0){
            echo '<p><a class="btn btn-danger" href="action.php?id='.$row['id'].'&status=1">Deactive</a></p>';
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
    }                ?>

                </table>

            </div>
        </div>
    </div>
</body>

</html>