// trading view script
// const getcoin = localStorage.getItem("coin")
//   ? localStorage.getItem("coin")
//   : "btc";

new TradingView.widget({
  autosize: true,
  symbol: "binance:" + getcoin + "usdt",
  interval: "1",
  timezone: "Asia/Kolkata",
  theme: "dark",
  style: "2",
  locale: "in",
  toolbar_bg: "#f1f3f6",
  enable_publishing: false,
  save_image: false,
  container_id: "tradingview_0c73c",
});

//adjust height wrt current height of device
$(".container").css(
  "height",
  $(document).outerHeight() - $(".header").outerHeight()
);
$(".menuContain").css("height", $(document).height());

// show menu
$("#hamburgerMenu").click(function () {
  $(".menuContain").animate({ left: "0" });
});
//close menu
$(".menuContain .heading").click(function () {
  $(".menuContain").animate({ left: "-1000px" }, "slow");
});

//changing coin to update chart
// $("#select_coin").val(getcoin);
// $("#select_coin").change(function () {
//   var coin = $("#select_coin").val();
//   console.log(coin);
//   // update coin to localstorage
//   localStorage.setItem("coin", coin);
//   // window.location.reload();
// });

function onSelectChange() {
  document.getElementById("frm").submit();
}

// increasing decreasing amount
$("#decreaseamount").click(function () {
  var amount = parseInt($("#placeamount").val().valueOf());
  if (amount > 100) {
    var newamount = (amount - 100).valueOf();
    $("#placeamount").val(newamount);
  } else {
    $("#placeamount").val(amount);
  }
});
$("#increaseamount").click(function () {
  var amount = parseInt($("#placeamount").val().valueOf());
  if (amount >= 0) {
    $("#placeamount").val(amount + 100);
  } else {
    $("#placeamount").val(amount);
  }
});

//fetching current price of selected coin
let ws = new WebSocket(
  "wss://stream.binance.com:9443/ws/" + getcoin + "usdt@trade"
);
ws.onmessage = (event) => {
  let stockObject = JSON.parse(event.data);
  // console.log(stockObject.p)
  $("#fetchCurrentPrice").val(stockObject.p);
};

//buy order
$("#buyOrderBtn").click(function () {
  var currentPrice = $("#fetchCurrentPrice").val();
  var amount = $("#placeamount").val();
  var time = $("#gettime").val();
  var stopLoss = $("#placeStopLoss").val();
  var target = $("#placetarget").val();
  var walletBalance = parseInt($("#updated_wallet_balance").text());
  data = {
    currentPrice: currentPrice,
    amount: amount,
    time: time,
    stopLoss: stopLoss,
    target: target,
    ordertype: "BuyOrder",
    stockSymbol: getcoin + "usdt",
    stockName: getcoin,
    walletBalance: walletBalance,
  };
  console.log(data);

  if (walletBalance >= amount) {
    //sending information using ajax to controller
    $.post(
      "../../controlller/buyorder.php",
      { data: data },
      function (data, status) {
        console.log(data);
        $("#updated_wallet_balance").text(walletBalance - amount);
        $(".alertMessage p").text("Buy Order Placed");
        $(".alertMessage").css("border-left", "3px solid #27AE60");
        $(".alertMessage").animate({ right: "0px" }, "slow").show();
        setTimeout(function () {
          $(".alertMessage").animate({ right: "-500px" }, "slow").hide();
        }, 3000);
      }
    );

    setTimeout(function () {
      var currentPrice = $("#fetchCurrentPrice").val();
      $data = {
        currentPrice: currentPrice,
        amount: amount,
        time: time,
        stopLoss: stopLoss,
        target: target,
        ordertype: "BuyOrder",
        stockSymbol: getcoin + "usdt",
        stockName: getcoin,
        walletBalance: walletBalance,
      };
      // $.post("../../controlller/buyorder.php",{},function(){

      // });
      console.log(data);
    }, time * 60 * 1000);
  } else {
    $(".alertMessage p").text("Add Money to Trade");
    $(".alertMessage").css("border-left", "3px solid #FF5757");
    $(".alertMessage").animate({ right: "0px" }, "slow").show();
    setTimeout(function () {
      $(".alertMessage").animate({ right: "-500px" }, "slow").hide();
      window.location = "./index.php";
    }, 3000);
  }
});

//sell order
$("#sellOrderBtn").click(function () {
  var currentPrice = $("#fetchCurrentPrice").val();
  var amount = $("#placeamount").val();
  var time = $("#gettime").val();
  var stopLoss = $("#placeStopLoss").val();
  var target = $("#placetarget").val();
  var walletBalance = parseInt($("#updated_wallet_balance").text());
  data = {
    currentPrice: currentPrice,
    amount: amount,
    time: time,
    stopLoss: stopLoss,
    target: target,
    ordertype: "SellOrder",
    stockSymbol: getcoin + "usdt",
    stockName: getcoin,
    walletBalance: walletBalance,
  };
  console.log(data);

  if (walletBalance >= amount) {
    //sending information using ajax to controller
    $.post(
      "../../controlller/buyorder.php",
      { data: data },
      function (data, status) {
        console.log(data);
        $("#updated_wallet_balance").text(walletBalance - amount);
        $(".alertMessage p").text("Sell Order Placed");
        $(".alertMessage").css("border-left", "3px solid #27AE60");
        $(".alertMessage").animate({ right: "0px" }, "slow").show();
        setTimeout(function () {
          $(".alertMessage").animate({ right: "-500px" }, "slow").hide();
        }, 3000);
      }
    );

    setTimeout(function () {
      var currentPrice = $("#fetchCurrentPrice").val();
      $data = {
        currentPrice: currentPrice,
        amount: amount,
        time: time,
        stopLoss: stopLoss,
        target: target,
        ordertype: "BuyOrder",
        stockSymbol: getcoin + "usdt",
        stockName: getcoin,
        walletBalance: walletBalance,
      };
      // $.post("../../controlller/buyorder.php",{},function(){

      // });
      console.log(data);
    }, time * 60 * 1000);
  } else {
    $(".alertMessage p").text("Add Money to Trade");
    $(".alertMessage").css("border-left", "3px solid #FF5757");
    $(".alertMessage").animate({ right: "0px" }, "slow").show();
    setTimeout(function () {
      $(".alertMessage").animate({ right: "-500px" }, "slow").hide();
      window.location = "./index.php";
    }, 3000);
  }
});

//ordersDetailsButton click to show order details panel
$("#ordersDetailsButton").click(function () {
  $(".ordersDetailsPanel").animate({ bottom: "0px" }).show();
});
$(".orderDetailsPanelCancelBtn").click(function () {
  $(".ordersDetailsPanel").animate({ bottom: "-100px" }).hide();
});

//function for sec to time
function secondsTimeSpanToHMS(s) {
  var h = Math.floor(s / 3600); //Get whole hours
  s -= h * 3600;
  var m = Math.floor(s / 60); //Get remaining minutes
  s -= m * 60;
  return h + ":" + (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s); //zero padding on minutes and seconds
}
//updating timer in order details panel
var intervelTime = window.setInterval(function () {
  $(".timerleft").each(function () {
    var count = $(this).text();
    count = count.replaceAll(":", ",");
    count = count.split(",");
    count = parseInt(
      parseInt(count[0] * 60 * 60) +
        parseInt(count[1] * 60) +
        parseInt(count[2])
    );
    if (count > 0) {
      count = count - 1;
      count = secondsTimeSpanToHMS(count);
      // console.log(count)
      $(this).text(count);
    } else {
      $(this).parent().parent().parent().hide();
      $(this).parent().parent().parent().parent().find(".timerBlock").hide();
    }
  });

  $(".timerBlockContent").each(function () {});
}, 1000);
