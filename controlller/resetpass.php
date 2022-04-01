<?php
include('../constant.php');

$user_id = $_POST['user_id'];
$password = md5($_POST['password']);

$update = "UPDATE `user_details` SET `password`='$password' WHERE `user_id` = '$user_id'";
if(mysqli_query($conn,$update)){
    echo "Password Updated";
}else{
    echo "Error" . mysqli_errno($conn);
}
?>