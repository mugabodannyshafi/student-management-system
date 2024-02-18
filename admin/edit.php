<?php 
include_once('navtest.php');
$con = mysqli_connect('localhost', 'root', '', 'php_search');
    if(isset($_POST['update'])){
                $id = $_GET['id'];
        $name = $_POST['name'];
        $hobbies = $_POST['hobbies'];
        $comment = $_POST['comment'];

        $update = "UPDATE `data` SET `name`='$name',`hobbies`='$hobbies',`comment`='$comment' WHERE id='$id'";

        $query = mysqli_query($con, $update);
        if($query){
            header("Location:display.php?message=successedit");
        }
        else{
            echo "error in editing";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-primary">Update Record</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">

                            <?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');
$id = $_GET['id'];
$select = mysqli_query($con, "SELECT * FROM `data` WHERE id='$id'");
if(mysqli_num_rows($select)>0){
    foreach ($select as $row)
        ;
}

                        ?>
                            <label for="" class="form-label">Name</label>
                            <input name="name" type="text" value="<?=$row['name'] ?>" class="form-control" required>
                            <label for="" class="form-label">Hobbies</label>
                            <input name="hobbies" type="text" value="<?=$row['hobbies'] ?>" class="form-control"
                                required>
                            <label for="" class="form-label">Comment</label>
                            <input name="comment" class="form-control" value="<?=$row['comment'] ?>"></input>

                    </div>
                    <div class="card-footer">
                        <div class="">
                            <button name="update" class="btn btn-primary p-sm-2 w-3">Send</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


</body>