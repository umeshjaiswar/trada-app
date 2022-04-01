<?php
include('../../constant.php');
session_start();
if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $getamount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT  `wallet_balance` FROM `user_details` WHERE `user_id` = '$user_id'"));
    
    $amount = $getamount['wallet_balance'] + $_POST['amount'];
    $update = mysqli_query($conn,"UPDATE `user_details` SET `wallet_balance`='$amount' WHERE `user_id` = '$user_id'");

    if($update){
        echo "Payment Success";
        header("Location: ".$base_url."/view/dashboard/");
    }else{
        echo "Error".mysqli_error($conn);
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fund</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" placeholder="Amount" name="amount">
        <button type="submit" name="submit">Add</button>
    </form>
</body>
</html>