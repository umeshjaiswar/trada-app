<?php
include('../../constant.php');
session_start();
var_dump($_SESSION);

if(isset($_POST['submit'])){
    session_unset();
    header("Location: ".$base_url."/view/login");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" value="<?php echo $_SESSION['useremail']; ?>">
        <input type="text" value="<?php echo $_SESSION['user_id']; ?>">

        <button type="submit" name="submit">Logout</button>
    </form>
</body>
</html>