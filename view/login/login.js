$(".signup_").css("right", "-500px").hide();
$(".login_").css("right", "-500px").hide();
$(".reset_").css("right", "-500px").hide();

$("#signupbtn").click(function () {
  $(".start_page").css("left", "-500px").hide();
  $(".signup_").animate({ right: "0px" }).show();
});
$("#loginbtn").click(function () {
  $(".start_page").css("left", "-500px").hide();
  $(".login_").animate({ right: "0px" }).show();
});
$("#login").click(function () {
  $(".signup_").css("right", "-500px").hide();
  $(".login_").animate({ right: "0px" }).show();
});
$(".resetbutton").click(function () {
  $(".login_").css("right", "-500px").hide();
  $(".reset_").animate({ right: "0px" }).show();
});
$(".resetloginbtn").click(function () {
  $(".reset_").css("right", "-500px").hide();
  $(".login_").animate({ right: "0px" }).show();
});

//back btn
$(".backbtn").click(function () {
  $(".start_page").animate({ left: "0px" }).show();
  $(".signup_panel").css("right", "-500px").hide();
});
//end here

//hide show password for signup page
$(".hideshowpassword .hide").click(function () {
  $(".hideshowpassword .hide").hide();
  $(".hideshowpassword .show").show();
  $("#signuppassword").attr("type", "text");
  $("#loginpassword").attr("type", "text");
});

$(".hideshowpassword .show").click(function () {
  $(".hideshowpassword .hide").show();
  $(".hideshowpassword .show").hide();
  $("#signuppassword").attr("type", "password");
  $("#loginpassword").attr("type", "password");
});
//end here

// signup email and password validation
$("#signupemail").keyup(function () {
  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test($(this).val())) {
    $(this).parent().parent().css("border", "1px solid #007000");
    console.log("right:" + $(this).val());
  } else {
    $(this).parent().parent().css("border", "1px solid #990000");
    console.log("wrong:" + $(this).val());
  }
});
$("#signuppassword").keyup(function () {
  if ($(this).val().length >= 6) {
    if (
      /^[A-Za-z0-9\d=!\-@._*]*$/.test($(this).val()) &&
      /[a-z]/.test($(this).val()) &&
      /\d/.test($(this).val()) &&
      /[A-Z]/.test($(this).val())
    ) {
      $(this).parent().parent().css("border", "1px solid #007000");
      console.log("right:" + $(this).val());
    } else {
      $(this).parent().parent().css("border", "1px solid #990000");
      console.log("wrong:" + $(this).val());
    }
  } else {
    $(this).parent().parent().css("border", "1px solid #990000");
    console.log("wrong:" + $(this).val());
  }
});
$("#register").click(function () {
  var email = $("#signupemail").val();
  var password = $("#signuppassword").val();

  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(email)) {
    if (
      password.length >= 6 &&
      /^[A-Za-z0-9\d=!\-@._*]*$/.test(password) &&
      /[a-z]/.test(password) &&
      /\d/.test(password) &&
      /[A-Z]/.test(password)
    ) {
      //run script
      //   console.log(email + password);
      $.post(
        "../../controlller/signup.php",
        { email: email, password: password },
        function (data, status) {
          console.log(data);
          if (data == "Check Your Email To Activate Account") {
            $(".signup_").css("right", "-500px").hide();
            $(".login_").animate({ right: "0px" }).show();
          }
          $("#message_content").text(data);
          $(".message_panel").show();
          setTimeout(function () {
            $(".message_panel").fadeOut();
          }, 2500);
        }
      );
    } else {
      console.log("Example Password: Abcd@123#");

      $("#message_content").text(
        "Password Should be 1-UpperCase, 1-Lowercase, 1-number, 1-special Character"
      );
      $(".message_panel").show();

      $("#signuppassword").parent().parent().css("border", "3px solid #990000");
      setTimeout(function () {
        $(".message_panel").fadeOut();
        $("#signuppassword")
          .parent()
          .parent()
          .css("border", "1px solid #990000");
      }, 3000);
    }
  } else {
    console.log("Wrong Email");

    $("#message_content").text("Wrong Email-ID");
    $(".message_panel").show();

    $("#signupemail").parent().parent().css("border", "3px solid #990000");
    setTimeout(function () {
      $(".message_panel").fadeOut();
      $("#signupemail").parent().parent().css("border", "1px solid #990000");
    }, 3000);
  }
});
//end

//login validation start here
$("#loginemail").keyup(function () {
  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test($(this).val())) {
    $(this).parent().parent().css("border", "1px solid #007000");
    console.log("right:" + $(this).val());
  } else {
    $(this).parent().parent().css("border", "1px solid #990000");
    console.log("wrong:" + $(this).val());
  }
});
$("#loginpassword").keyup(function () {
  if ($(this).val().length >= 6) {
    if (
      /^[A-Za-z0-9\d=!\-@._*]*$/.test($(this).val()) &&
      /[a-z]/.test($(this).val()) &&
      /\d/.test($(this).val()) &&
      /[A-Z]/.test($(this).val())
    ) {
      $(this).parent().parent().css("border", "1px solid #007000");
      console.log("right:" + $(this).val());
    } else {
      $(this).parent().parent().css("border", "1px solid #990000");
      console.log("wrong:" + $(this).val());
    }
  } else {
    $(this).parent().parent().css("border", "1px solid #990000");
    console.log("wrong:" + $(this).val());
  }
});

$(".loginbutton").click(function () {
  var email = $("#loginemail").val();
  var password = $("#loginpassword").val();

  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(email)) {
    if (
      password.length >= 6 &&
      /^[A-Za-z0-9\d=!\-@._*]*$/.test(password) &&
      /[a-z]/.test(password) &&
      /\d/.test(password) &&
      /[A-Z]/.test(password)
    ) {
      //run script
      //   console.log(email + password);
      $.post(
        "../../controlller/login.php",
        { email: email, password: password },
        function (data, status) {
          console.log(data);
          if (data == "Successfully LoggedIn") {
            // $(".login_").css("right", "-500px").hide();
            // $(".start_page").animate({ left: "0px" }).show();
            $("#message_content").text(data);
            $(".message_panel").show();
            setTimeout(function () {
              $(".message_panel").fadeOut();
              window.location = "../dashboard/";
            }, 1500);
          }
        }
      );
    } else {
      console.log("Example Password: Abcd@123#");

      $("#message_content").text(
        "Password Should be 1-UpperCase, 1-Lowercase, 1-number, 1-special Character"
      );
      $(".message_panel").show();

      $("#loginpassword").parent().parent().css("border", "3px solid #990000");
      setTimeout(function () {
        $(".message_panel").fadeOut();
        $("#loginpassword")
          .parent()
          .parent()
          .css("border", "1px solid #990000");
      }, 3000);
    }
  } else {
    console.log("Wrong Email");

    $("#message_content").text("Wrong Email-ID");
    $(".message_panel").show();

    $("#loginemail").parent().parent().css("border", "3px solid #990000");
    setTimeout(function () {
      $(".message_panel").fadeOut();
      $("#loginemail").parent().parent().css("border", "1px solid #990000");
    }, 3000);
  }
});
//end

//reset password validation

$("#resetemail").keyup(function () {
  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test($(this).val())) {
    $(this).parent().parent().css("border", "1px solid #007000");
    console.log("right:" + $(this).val());
  } else {
    $(this).parent().parent().css("border", "1px solid #990000");
    console.log("wrong:" + $(this).val());
  }
});

$(".resetpasswordbutton").click(function () {
  var email = $("#resetemail").val();

  if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(email)) {
    $.post(
      "../../controlller/resetpasswordlink.php",
      { email: email },
      function (data, status) {
        console.log(data);

        $("#message_content").text(data);
        $(".message_panel").show();
        setTimeout(function () {
          $(".message_panel").fadeOut();
        }, 2500);
      }
    );
  } else {
    $("#resetemail").parent().parent().css("border", "3px solid #990000");
    setTimeout(function () {
      $(".message_panel").fadeOut();
      $("#resetemail").parent().parent().css("border", "1px solid #990000");
    }, 3000);
  }
});
