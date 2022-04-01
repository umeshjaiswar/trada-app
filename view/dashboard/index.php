<?php
include('../../constant.php');
session_start();
if (isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])) {
    if ($_SESSION['loggedIn'] == true) {
        $user_id = $_SESSION['user_id'];
        $userdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_details` WHERE `user_id` = '$user_id ' "));
    } else {
        header("Location: " . $base_url . "/view/login");
    }
} else {
    header("Location: " . $base_url . "/view/login");
}

$coin = "btc";
if (isset($_POST['select_coin'])) {
    $coin = $_POST['select_coin'];
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- jquery cnd  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="left">
            <div class="row" id="hamburgerMenu">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 0 24 24" width="28">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path fill="#ffffff" d="M4 18h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zm0-5h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zM3 7c0 .55.45 1 1 1h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1z" />
                </svg>
                <h2>TRADA</h2>
            </div>

            <div class="row">
                <form action="" method="POST" id="frm">
                    <select name="select_coin" id="select_coin" value="<?php echo $coin; ?>" onchange="onSelectChange()">
                        <option <?php echo $coin == "btc" ? "selected" : "notselected"; ?> value="btc">Bitcoin (BTC/USD)</option><!-- btcusdt -->
                        <option <?php echo $coin == "eth" ? "selected" : "notselected"; ?> value="eth">Ethereum (ETH/USD)</option><!-- ethusdt -->
                        <option <?php echo $coin == "ada" ? "selected" : "notselected"; ?> value="ada">Cardano (ADA/USD)</option> <!-- adausdt -->
                        <option <?php echo $coin == "doge" ? "selected" : "notselected"; ?> value="doge">Dogecoin (DOGE/USD)</option> <!-- dogeusdt -->
                        <option <?php echo $coin == "matic" ? "selected" : "notselected"; ?> value="matic">Polygon (MATIC/USD)</option><!-- maticusdt -->
                        <option <?php echo $coin == "xlm" ? "selected" : "notselected"; ?> value="xlm">Stellar (XLM/USD)</option><!-- xlmusdt -->
                        <option <?php echo $coin == "luna" ? "selected" : "notselected"; ?> value="luna">Terra (LUNA/USD)</option><!-- lunausdt -->
                        <option <?php echo $coin == "bnb" ? "selected" : "notselected"; ?> value="bnb">Binance Coin (BNB/USD)</option><!-- bnbusdt -->
                        <option <?php echo $coin == "shib" ? "selected" : "notselected"; ?> value="shib">Shiba Inu (SHIB/USD)</option><!-- shibusdt -->
                    </select>
                </form>
            </div>
        </div>
        <div class="right">
            <!-- <div class="wallet_balance">
                <p>Wallet: ₹</p>
                <p id="updated_wallet_balance">
                    <?php //echo $userdata['wallet_balance'];
                    ?>
                </p>
            </div> -->
            <div class="addMoneyBtn" id="ordersDetailsButton">
                <p class="addFundBtn">Orders</p>
            </div>


            <div class="addMoneyBtn" onclick="window.location='<?php echo $base_url; ?>view/addfund/'">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                    <g id="Frames-24px">
                        <rect fill="none" width="24" height="24" />
                    </g>
                    <g id="Solid">
                        <g>
                            <path fill="#0e0f12" d="M21,10h-1V8c0-1.103-0.897-2-2-2h-0.382l-1.724-3.447c-0.233-0.465-0.782-0.673-1.266-0.482L4.807,6H4C2.897,6,2,6.897,2,8v12c0,1.103,0.897,2,2,2h14c1.103,0,2-0.897,2-2v-2h1c0.552,0,1-0.448,1-1v-6C22,10.448,21.552,10,21,10zM14.517,4.27L15.382,6h-5.189L14.517,4.27z M20,16h-6.585l-2-2l2-2H20V16z" />
                            <circle fill="#0e0f12" cx="15" cy="14" r="1" />
                        </g>
                    </g>
                </svg>₹
                <p class="addFundBtn" id="updated_wallet_balance"><?php echo $userdata['wallet_balance']; ?></p>
            </div>
            <div class="profile" onclick="window.location='../profile/'">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-account" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#FFFFFF" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="left chart">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_0c73c"></div>
            </div>

            <!-- TradingView Widget END -->
        </div>
        <div class="right">
            <div class="top">
                <input style="border: none;outline: none;padding: 0.3rem; border-radius: 2px;font-size: 15px;width: 90%;background: #2d2d2d;color: white;" type="text" id="fetchCurrentPrice" readonly>
                <div class="amount">
                    <p>Amount ₹</p>
                    <div class="row">
                        <p id="decreaseamount">-</p>
                        <input type="number" id="placeamount" value="1000" placeholder="Amount" min="100" step="100">
                        <p id="increaseamount">+</p>
                    </div>
                </div>

                <div class="time">
                    <p>Time</p>
                    <div class="row">
                        <select name="" id="gettime">
                            <option value="1">1 min</option>
                            <option value="5">5 min</option>
                            <option value="15">15 min</option>
                            <option value="30">30 min</option>
                            <option value="60">1 hour</option>
                            <option value="180">3 hour</option>
                            <option value="300">5 hour</option>
                        </select>
                    </div>
                </div>

                <div class="stoploss">
                    <div class="row">
                        <p>Stop Loss</p>
                        <div class="row">
                            <select name="placeStopLoss" id="placeStopLoss">
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30" selected>30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <p>Target</p>
                        <div class="row">
                            <select name="placetarget" id="placetarget">
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50" selected>50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="down">
                <div class="row">
                    <button id="buyOrderBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 0 24 24" width="22">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path fill="#ffffff" d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z" />
                        </svg>
                        BUY
                    </button>

                    <button id="sellOrderBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 0 24 24" width="22">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path fill="#ffffff" d="M11 5v11.17l-4.88-4.88c-.39-.39-1.03-.39-1.42 0-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0L13 16.17V5c0-.55-.45-1-1-1s-1 .45-1 1z" />
                        </svg>
                        SELL
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="ordersDetailsPanel" style="display: none;">
        <div class="heading">
            <h3>Order Details</h3>
            <p class="orderDetailsPanelCancelBtn"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-close" width="22" height="22" viewBox="0 0 24 24">
                    <path fill="#ffffff" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                </svg></p>
        </div>
        <div class="content">
            <?php
            $user_id = $_SESSION['user_id'];
            $ordersDetails = "SELECT * FROM `order_transactions` WHERE `user_id` = '$user_id' order by created_at asc";
            $orderDetailsQuery = mysqli_query($conn, $ordersDetails);
            if ($orderDetailsQuery->num_rows > 0) {
                while ($data = mysqli_fetch_assoc($orderDetailsQuery)) {
                    // print_r($data);
                    // exit;
            ?>
                    <div class="row">
                        <div class="col">
                            <div class="left">
                                <h3><?php echo $data['stock_name']; ?></h3>
                            </div>
                            <div class="right">
                                <h3>₹<?php echo $data['wl_amount']; ?></h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="left">
                                <p>Investment</p>
                            </div>
                            <div class="right">
                                <h4>₹<?php echo $data['amount']; ?></h4>
                            </div>
                        </div>

                        <div class="col">
                            <div class="left">
                                <p>Entry : <?php echo substr($data['created_at'], 11, 19); ?></p>
                            </div>
                            <div class="right">
                                <p>Buy : ₹<?php echo intval($data['entry_price']); ?></p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="left">
                                <p>Exit : <?php echo substr($data['time'], 11, 19); ?></p>
                            </div>
                            <div class="right">
                                <p>Exit : ₹<?php echo $data['exit_price']; ?></p>
                            </div>
                        </div>

                        <div class="col timer">
                            <div class="left">
                                <span>TIME LEFT : <span class="timerleft">
                                        <?php
                                        $str = new DateTime($data['created_at']);
                                        $end = new DateTime($data['time']);
                                        $diff = $end->diff($str);
                                        echo $diff->h . ":" . $diff->i . ":" . $diff->s;
                                        ?>
                                    </span></span>
                            </div>
                            <div class="right">
                                <button class="currentOrderExitbtn">Exit</button>
                            </div>
                        </div>

                        <div class="col timerBlock">
                            <div class="row" id="timerBlockContent"></div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No Order Placed";
            }
            ?>
            <!-- <div class="row">
                <div class="col">
                    <div class="left">
                        <h3>BTCUSD</h3>
                    </div>
                    <div class="right">
                        <h3>₹1500</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="left">
                        <p>Investment</p>
                    </div>
                    <div class="right">
                        <h4>₹1000</h4>
                    </div>
                </div>

                <div class="col">
                    <div class="left">
                        <p>Entry : 04:30:10PM</p>
                    </div>
                    <div class="right">
                        <p>Buy : ₹15000</p>
                    </div>
                </div>

                <div class="col">
                    <div class="left">
                        <p>Exit : 04:40:10PM</p>
                    </div>
                    <div class="right">
                        <p>Exit : ₹15400</p>
                    </div>
                </div>

                <div class="col timer">
                    <div class="left">
                        <span>TIME LEFT : <span class="timerleft">00:01:00</span></span>
                    </div>
                    <div class="right">
                        <button class="currentOrderExitbtn">Exit</button>
                    </div>
                </div>

                <div class="col timerBlock">
                    <div class="row" id="timerBlockContent"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="left">
                        <h3>BTCUSD</h3>
                    </div>
                    <div class="right">
                        <h3>₹1500</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="left">
                        <p>Investment</p>
                    </div>
                    <div class="right">
                        <h4>₹1000</h4>
                    </div>
                </div>

                <div class="col">
                    <div class="left">
                        <p>Entry : 04:30:10PM</p>
                    </div>
                    <div class="right">
                        <p>Buy : ₹15000</p>
                    </div>
                </div>

                <div class="col">
                    <div class="left">
                        <p>Exit : 04:40:10PM</p>
                    </div>
                    <div class="right">
                        <p>Exit : ₹15400</p>
                    </div>
                </div>

                <div class="col timer">
                    <div class="left">
                        <span>TIME LEFT : <span class="timerleft">00:00:10</span></span>
                    </div>
                    <div class="right">
                        <button class="currentOrderExitbtn">Exit</button>
                    </div>
                </div>

                <div class="col timerBlock">
                    <div class="row" id="timerBlockContent"></div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="menuContain">
        <div class="heading">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="#ffffff" d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
            </svg>
            <h2>TRADA</h2>
        </div>

        <div class="list">
            <div class="row trade">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-swap-horizontal" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#C4C4C4" d="M21,9L17,5V8H10V10H17V13M7,11L3,15L7,19V16H14V14H7V11Z" />
                </svg>
                Trade
            </div>

            <div class="row balance">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-currency-inr" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#C4C4C4" d="M8,3H18L17,5H13.74C14.22,5.58 14.58,6.26 14.79,7H18L17,9H15C14.75,11.57 12.74,13.63 10.2,13.96V14H9.5L15.5,21H13L7,14V12H9.5V12C11.26,12 12.72,10.7 12.96,9H7L8,7H12.66C12.1,5.82 10.9,5 9.5,5H7L8,3Z" />
                </svg>
                Balance
            </div>

            <div class="row whatsNew">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-bullhorn" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#C4C4C4" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z" />
                </svg>
                What's New?
            </div>

            <div class="row bonus">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-gift" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#C4C4C4" d="M9.06,1.93C7.17,1.92 5.33,3.74 6.17,6H3A2,2 0 0,0 1,8V10A1,1 0 0,0 2,11H11V8H13V11H22A1,1 0 0,0 23,10V8A2,2 0 0,0 21,6H17.83C19,2.73 14.6,0.42 12.57,3.24L12,4L11.43,3.22C10.8,2.33 9.93,1.94 9.06,1.93M9,4C9.89,4 10.34,5.08 9.71,5.71C9.08,6.34 8,5.89 8,5A1,1 0 0,1 9,4M15,4C15.89,4 16.34,5.08 15.71,5.71C15.08,6.34 14,5.89 14,5A1,1 0 0,1 15,4M2,12V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V12H13V20H11V12H2Z" />
                </svg>
                Bonus
            </div>

            <div class="row support">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-face-agent" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#C4C4C4" d="M18.72,14.76C19.07,13.91 19.26,13 19.26,12C19.26,11.28 19.15,10.59 18.96,9.95C18.31,10.1 17.63,10.18 16.92,10.18C13.86,10.18 11.15,8.67 9.5,6.34C8.61,8.5 6.91,10.26 4.77,11.22C4.73,11.47 4.73,11.74 4.73,12A7.27,7.27 0 0,0 12,19.27C13.05,19.27 14.06,19.04 14.97,18.63C15.54,19.72 15.8,20.26 15.78,20.26C14.14,20.81 12.87,21.08 12,21.08C9.58,21.08 7.27,20.13 5.57,18.42C4.53,17.38 3.76,16.11 3.33,14.73H2V10.18H3.09C3.93,6.04 7.6,2.92 12,2.92C14.4,2.92 16.71,3.87 18.42,5.58C19.69,6.84 20.54,8.45 20.89,10.18H22V14.67H22V14.69L22,14.73H21.94L18.38,18L13.08,17.4V15.73H17.91L18.72,14.76M9.27,11.77C9.57,11.77 9.86,11.89 10.07,12.11C10.28,12.32 10.4,12.61 10.4,12.91C10.4,13.21 10.28,13.5 10.07,13.71C9.86,13.92 9.57,14.04 9.27,14.04C8.64,14.04 8.13,13.54 8.13,12.91C8.13,12.28 8.64,11.77 9.27,11.77M14.72,11.77C15.35,11.77 15.85,12.28 15.85,12.91C15.85,13.54 15.35,14.04 14.72,14.04C14.09,14.04 13.58,13.54 13.58,12.91A1.14,1.14 0 0,1 14.72,11.77Z" />
                </svg>
                Support
            </div>

            <div class="row setting">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path fill="#C4C4C4" d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z" />
                </svg>
                Setting
            </div>


        </div>
    </div>

    <div class="alertMessage">
        <p>Test mesage</p>
    </div>
    <!-- trading view script  -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <!-- end here  -->

    <script>
        // define current selected coin
        const getcoin = '<?php echo $coin ? $coin : "btc"; ?>'
    </script>

    <script src="index.js"></script>

</body>

</html>