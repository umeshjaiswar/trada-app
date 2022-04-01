<?php
include('../constant.php');
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$check = mysqli_query($conn, "SELECT * FROM `user_details` WHERE `email`='$email'");
if ($check->num_rows > 0) {

    $data = mysqli_fetch_assoc($check);
    // print_r($data);
    if ($data['password'] == $password) {

        if ($data['validate_status'] == 1) {
            echo "Successfully LoggedIn";
            $_SESSION['loggedIn'] = true;
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['useremail'] = $email;

            // get the client IP address
            $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
            $_SESSION['ipaddress'] = $ip;
           
        } else {
            echo "Verify Your Email";
        }
    } else {
        echo "Wrong Password";
    }
} else {
    echo "No user Found";
}
