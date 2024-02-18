<?php include_once('navtest.php');?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP SEARCH</title>
    <!-- bootstrap css link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Adding datatables style cdn -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.jqueryui.min.css">
    </link>
</head>

<body></body>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="example">
                        <thead class="bg-light">
                            <tr>
                                <?php $cid = 1; ?>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Date Of Birth</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <?php 
  // Database Connection 
        $con = mysqli_connect('localhost', 'root', '', 'php_search');

                    $sql = mysqli_query($con, "SELECT * FROM `students`");
                    if(mysqli_num_rows($sql)>0){
                        while($row =mysqli_fetch_assoc($sql)){
                            $name = $row['name'];
                             $email = $row['email'];
                              $gender = $row['gender'];
                              $dob=$row['dob'];
                              if($gender ==""){
                                $gender = "Not Defined";
                              }
                              if($dob ==""){
                                $dob = "Not Defined";
                                 $age = "Not Defined";
                              }
                              else{
                                $dob = date('D, F j, Y', strtotime($dob));
                                $date1 = date_create($dob);
                                $date2 = date_create('now');
                                $diff=date_diff($date1, $date2);
                                $age = $diff->format("%Y years");
                              }
                            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $cid; ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $gender ?></td>
                                <td><?php echo $dob ?></td>
                                <td><?php echo $age ?></td>
                            </tr>
                        </tbody>

                        <?php
                            $cid++;
                        }
                    }
                    ?>

                    </table>
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
                <p class="text-white mt-2">&#169; Gloire 2022<?php date('y-m-y') ?></p>
            </div>
        </div>
    </div>
</div>

<!-- addon of jqquery cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- addon of datatables cdn -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.1/js/dataTables.jqueryui.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</body>