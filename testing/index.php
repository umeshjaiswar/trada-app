<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

<select name="" id="coins">
    <option value="">Select Coin</option>
    <option value="">Bitcoin</option>
    <option value="">Ethereum</option>
    <option value="">Solana</option>
    <option value="">Cardano</option>
    <option value="">Dogecoin</option>
    <option value="">Polygon</option>
    <option value="">Stellar</option>
    <option value="">Terra</option>
    <option value="">Binance Coin</option>
    <option value="">Shiba Inu</option>
</select>

    <button type="button" id="btn">Get Price</button>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="tradingview_0c73c"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 980,
                "height": 610,
                "symbol": "XAUINRG",
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
            $('#btn').click(function() {
                console.log($('.legend-1WIwNaDF .legendMainSourceWrapper-1WIwNaDF .item-1WIwNaDF .valuesWrapper-1WIwNaDF .valuesAdditionalWrapper-1WIwNaDF .valueItem-1WIwNaDF .valueValue-1WIwNaDF'))
            })
        </script>
    </div>

    <!-- TradingView Widget END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/FX_IDC-XAUINRG/" rel="noopener" target="_blank"><span class="blue-text">XAUINRG Quotes</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
            {
                "symbol": "FX_IDC:XAUINRG",
                "width": 350,
                "colorTheme": "dark",
                "isTransparent": false,
                "locale": "in"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->




    <?php
    //     curl -X GET -H "X-API-KEY: f6412fdf260d55b6cb460cb4e5bad69cf6412fdf" 
    //     http://goldpricez.com/api/rates/currency/gbp/measure/gram

    //     $curl_handle=curl_init();
    //   curl_setopt($curl_handle,CURLOPT_URL,'http://www.google.com');
    //   curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
    //   curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
    //   $buffer = curl_exec($curl_handle);
    //   curl_close($curl_handle);
    //   if (empty($buffer)){
    //       print "Nothing returned from url.<p>";
    //   }
    //   else{
    //       print $buffer;
    //   }

    // preg_match('#Gold price today in India <b>\(Rs\/10gm\)</b> is <b>([0-9\.]+)#', file_get_contents('http://www.marketonmobile.com/gold_price_india.php'), $matches);
    // echo 'The price is: ' . $matches;
    ?>

    <div class="price">

    </div>

    <script>
        // const settings = {
        //     "async": true,
        //     "crossDomain": true,
        //     "url": "https://alpha-vantage.p.rapidapi.com/query?interval=5min&function=TIME_SERIES_INTRADAY&symbol=BTC&datatype=json&output_size=compact",
        //     "method": "GET",
        //     "headers": {
        //         "x-rapidapi-host": "alpha-vantage.p.rapidapi.com",
        //         "x-rapidapi-key": "924a2c15c8msha196e0b69401496p1e6de9jsn7c257dc5d4e2"
        //     }
        // };

        // $.ajax(settings).done(function(response) {
        //     console.log(response);
        // });

        // var myHeaders = new Headers();
        // myHeaders.append("x-access-token", "goldapi-1ku1al0qbtzk5-io");
        // myHeaders.append("Content-Type", "application/json");

        // var requestOptions = {
        //     method: 'GET',
        //     headers: myHeaders,
        //     redirect: 'follow'
        // };

        // fetch("https://www.goldapi.io/api/XAU/INR", requestOptions)
        //     .then(response => response.text())
        //     .then(result => {
        //         console.log(result);
        //         $('.price').html(result)
        //     })
        //     .catch(error => console.log('error', error));

        // $('.price').text($('.apply-overflow-tooltip')[0].outerText())
     
        
    </script>
</body>

</html>