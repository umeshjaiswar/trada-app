<?php
include('../constant.php');
session_start();
date_default_timezone_set('Asia/Kolkata');


$user_id = $_SESSION['user_id'];
$date = date('Y-m-d H:i:s');
$data = $_POST['data'];
$currentPrice = $data['currentPrice'];
$amount = $data['amount'];

$nowTime = time();
$addtime = $nowTime + ($data['time']*60);
$time = date('Y-m-d H:i:s',$addtime);

$stopLoss = $data['stopLoss'];
$target = $data['target'];
$ordertype = $data['ordertype'];
$stockSymbol = $data['stockSymbol'];
$stockName = $data['stockName'];
$walletBalance = $data['walletBalance'];

$order_id = md5($date . $data['ordertype'] . $user_id);

$insertTransaction = "INSERT INTO `order_transactions`(`order_id`, `user_id`, `stock_name`, `stock_symbol`, `entry_price`, `amount`, `time`, `stoploss`, `target`, `order_type`) VALUES ('$order_id','$user_id','$stockName','$stockSymbol','$currentPrice','$amount','$time','$stopLoss','$target','$ordertype')";
$query = mysqli_query($conn, $insertTransaction);

if ($query) {
    $updateBalance = ($walletBalance - $amount);
    $updateWallet = mysqli_query($conn, "UPDATE `user_details` SET `wallet_balance`='$updateBalance' WHERE `user_id`='$user_id'");
    if($updateWallet){
        echo "Success";
    }else{
        echo "Error".mysqli_error($conn);
    }
} else {
    echo "Error" . mysqli_error($conn);
}
// echo $order_id.$date;
// echo $user_id;
// print_r($data);
