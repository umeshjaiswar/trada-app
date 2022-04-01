<?php
include('../constant.php');
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);
$user_id = md5($email);

$check = mysqli_query($conn, "SELECT `email` FROM `user_details` WHERE `email`='$email'");
if ($check->num_rows > 0) {
    echo "This email is already register";
} else {
    $create = "INSERT INTO `user_details`(`user_id`, `email`, `password`) VALUES ('$user_id','$email','$password')";
    $query = mysqli_query($conn, $create);
    if ($query) {
        echo "Check Your Email To Activate Account";
        // $msg = "Click This Link To activate your account: http://baglelo.com/trada/verify.php?user_id=".$user_id;
        // mail($email,"TRADA - Verify Email",$msg);
    } else {
        echo "Error" . mysqli_errno($conn);
    }
}
?>