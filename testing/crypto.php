<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <select name="" id="coins">
        <!-- <option value="">Select Coin</option> -->
        <option value="btc">Bitcoin</option><!-- btcusdt -->
        <option value="eth">Ethereum</option><!-- ethusdt -->
        <!-- <option value="xym">Solana</option> xymusdt -->
        <option value="ada">Cardano</option> <!-- adausdt -->
        <option value="doge">Dogecoin</option> <!-- dogeusdt -->
        <option value="matic">Polygon</option><!-- maticusdt -->
        <option value="xlm">Stellar</option><!-- xlmusdt -->
        <option value="luna">Terra</option><!-- lunausdt -->
        <option value="bnb">Binance Coin</option><!-- bnbusdt -->
        <option value="shib">Shiba Inu</option><!-- shibusdt -->
    </select>

    <div class="currentbtcprice"></div>

    <button id="buyorder">BUY</button>
    <button id="exitorder">EXIT</button>
    <div class="buyprice"></div>
    <div class="sellprice"></div>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="tradingview_0c73c"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 980,
                "height": 610,
                "symbol": "binance:shibusdt",
                "interval": "1",
                "timezone": "Asia/Kolkata",
                "theme": "dark",
                "style": "2",
                "locale": "in",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "save_image": false,
                "container_id": "tradingview_0c73c"
            });
        </script>
    </div>

    <!-- TradingView Widget END -->

    <script>
        // // live bitcoin price using docs.coincap.io and websoket io
        // const pricesWs = new WebSocket('wss://ws.coincap.io/prices?assets=bitcoin')
        // pricesWs.onmessage = function(msg) {
        //     var data = msg.data.split(":")
        //     data = data[1].replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\"\*\+\?\|\<\>\-\&])/g, '')
        //     // console.log(data)
        //     // $('.currentprice').text("Bitcoin: " + data)
        // }
        // // end here


        $('#coins').change(function() {
            // console.log($(this).val())
            var coin = $(this).val();
            // new TradingView.widget({
            //     "width": 980,
            //     "height": 610,
            //     "symbol": coin + "usd",
            //     "interval": "1",
            //     "timezone": "Asia/Kolkata",
            //     "theme": "dark",
            //     "style": "2",
            //     "locale": "in",
            //     "toolbar_bg": "#f1f3f6",
            //     "enable_publishing": false,
            //     "save_image": false,
            //     "container_id": "tradingview_0c73c"
            // });
            // let ws = new WebSocket('wss://stream.binance.com:9443/ws/'+coin+'usdt@trade');
            // ws.onmessage = (event) => {
            //     let stockObject = JSON.parse(event.data);
            //     // console.log(stockObject.p)
            //     $('.currentbtcprice').text(stockObject.p)
            // }
            localStorage.setItem('coin',$(this).val());
            window.location.reload();

        })

        $('#buyorder').click(function() {
            // $.get("https://api.coingecko.com/api/v3/coins/" + $('#coins').val(), function(data, status) {
            //     $('.buyprice').text("BUY PRICE: "+data['market_data']['current_price']['usd'])
            // });
            $('.buyprice').text($('.currentbtcprice').text())

        })
        $('#exitorder').click(function() {
            $('.sellprice').text($('.currentbtcprice').text())
        })
    </script>


    <script>
        // using binance 
        var coin_ = localStorage.getItem('coin')?localStorage.getItem('coin'):"btc";
        let ws = new WebSocket('wss://stream.binance.com:9443/ws/'+coin_+'usdt@trade');
        ws.onmessage = (event) => {
            let stockObject = JSON.parse(event.data);
            // console.log(stockObject.p)
            $('.currentbtcprice').text(stockObject.p)
        }
        $('#coins').val(coin_);
        
    </script>
</body>

</html>

<!-- 
etheur
btcusdt

-->