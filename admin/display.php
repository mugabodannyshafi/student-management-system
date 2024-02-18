<?php
include_once('action.php');
include_once('navtest.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"
        integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Adding datatables style cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- addon of jqquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- addon of datatables cdn -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- initializing  datatables-->
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <title>Display</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-3">
                <?php
        if(isset($_GET['message'])): 
        ?>
                <div class="alert alert-success" id="alert" role="alert">
                    <?php 
if($_GET['message']=='successedit'){
    echo"Data Updated successfully";
}
elseif($_GET['message']=='successdelete'){
        echo "Data successfuly deleted";
}
elseif($_GET['message']=='successadd'){
        echo "Data Added Successfully";
}
            ?>
                </div>
                <?php endif  ?>
                <div class="card shadow">
                    <div class="card-header text-center bg-light text-dark">
                        <h4>All data from database</h4>
                    </div>
                    <div class="card-body">
                        <div class="overflow-x:auto">
                            <table class="table table-bordered table-striped table-hover table-responsive" id="example">
                                <thead>
                                    <tr>
                                        <?php $cid=1 ?>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Hobbies</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th colspan=2>Action</th>
                                    </tr>
                                </thead>
                                <?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');
if(!$con){
    die("error");
}
$select = mysqli_query($con, "SELECT * FROM `data`");

if(mysqli_num_rows($select)>0){
    while($row =mysqli_fetch_assoc($select)){
        ?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $cid ?></th>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['hobbies'] ?></td>
                                        <td><?php echo $row['comment'] ?></td>
                                        <td>
                                            <?php
if($row['status']==1){
            echo '<p><a href="status/active.php?id='.$row['id'].'&status=0" class="btn btn-primary">Active</a> </p>';
}
else{
            echo '<p><a href="status/active.php?id='.$row['id'].'&status=1" class="btn btn-danger">Deactive</a> </p>';
}
?>
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id'] ?>" title="update"
                                                class="btn btn-primary"><i class="fas fa-edit text-white"></i></a>

                                        </td>
                                        <td> <a href="delete.php?id=<?php echo $row['id'] ?>"
                                                onclick="return confirm('Do you want to delete')" title="delete"
                                                class="btn btn-danger"><i class="fas fa-trash text-white"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $cid++; ?>
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
    </div>
    <!-- --- Footer started here--- -->
    <div class="container-fluid">
        <div class="row">
            <div class="footer mt-5 bg-dark">
                <div class="text-center">
                    <p class="text-white mt-2">&#169; Gloire<?php date('D') ?></p>
                </div>
            </div>
        </div>

    </div>

</body>

<script>
setTimeout(function() {
    document.getElementById('alert').style.display = "none";
}, 3000);
</script>

<!-- <script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script> -->

</html>