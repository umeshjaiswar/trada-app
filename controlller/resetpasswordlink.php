<?php
include('../constant.php');

$email = $_POST['email'];
$query = mysqli_query($conn, "SELECT * FROM `user_details` WHERE `email`='$email'");
if ($query->num_rows > 0) {
    $data = mysqli_fetch_assoc($query);
    // print_r($data);
    // echo "http://baglelo.com/trada/reset.php?user_id=" . $data['user_id'];
    $msg = "Click This Link To Reset your Password: http://baglelo.com/trada/reset.php?user_id=" . $data['user_id'];
    $mail = mail($email, "TRADA - Reset Password", $msg);

    if($mail == true){
        echo "Reset Password Mail Sent Successfully";
    }else{
        echo "Error Mail Not sent";
    }
}
