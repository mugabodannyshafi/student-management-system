<?php
$con = mysqli_connect('localhost', 'root', '', 'php_search');

$id = $_GET['id'];
$status = $_GET['status'];
$update_query = "UPDATE  `data` SET status='$status' WHERE id='$id'";
mysqli_query($con, $update_query);
header("Location:table_inactive.php");
?>