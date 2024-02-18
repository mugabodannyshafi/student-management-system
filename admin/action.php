<?php
 $con = mysqli_connect('localhost', 'root', '', 'php_search');


if(isset($_POST['send']))
{
$name = $_POST['name'];
$hobbies = $_POST['hobbies'];
$comment = $_POST['comment'];

$insert = "INSERT INTO `data`(`name`, `hobbies`, `comment`) VALUES ('$name','$hobbies','$comment')";

$query = mysqli_query($con, $insert);

if($query){
        header("location:display.php?message=successadd");
}
else{
        echo "Failed" . mysqli_error($con);
}

}

?>