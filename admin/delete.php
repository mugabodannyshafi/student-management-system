<?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');
if(!$con){
    die("error");
}
$id = $_GET['id'];
$delete = "DELETE FROM `data` WHERE id='$id'";

$query =mysqli_query($con,$delete);


if($query){
    header("Location:display.php?message=successdelete");
}

?>