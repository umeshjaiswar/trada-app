<?php
include('./constant.php');
$user_id = $_GET['user_id'];

$check = "SELECT * FROM `user_details` WHERE `user_id`='$user_id'";
$query = mysqli_query($conn,$check);
if($query->num_rows>0){
    $update = "UPDATE `user_details` SET `validate_status`='1' WHERE `user_id`='$user_id'";
    if(mysqli_query($conn,$update)){
        echo "Account Verify";
    }else{
        echo "Error". mysqli_error($conn);
    }
}else{
    echo "Invalid User";
}
?>
