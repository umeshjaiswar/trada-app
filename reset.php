<?php
include('./constant.php');
?>
<script>
    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    const user__id = parameters.get('user_id');
    
</script>
<?php
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="./view/login/style.css">

    <!-- jquery cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="signup_panel reset_password">
        <div class="content">
            <h3>RESET PASSWORD</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-key" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#929394" d="M7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14M12.65,10C11.83,7.67 9.61,6 7,6A6,6 0 0,0 1,12A6,6 0 0,0 7,18C9.61,18 11.83,16.33 12.65,14H17V18H21V14H23V10H12.65Z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" id="resetpassword" name="password" autocomplete="on">
                    </div>
                    <div class="hideshowpassword">
                        <div class="show" style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-eye" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#929394" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                            </svg>
                        </div>

                        <div class="hide">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-eye-off" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#929394" d="M11.83,9L15,12.16C15,12.11 15,12.05 15,12A3,3 0 0,0 12,9C11.94,9 11.89,9 11.83,9M7.53,9.8L9.08,11.35C9.03,11.56 9,11.77 9,12A3,3 0 0,0 12,15C12.22,15 12.44,14.97 12.65,14.92L14.2,16.47C13.53,16.8 12.79,17 12,17A5,5 0 0,1 7,12C7,11.21 7.2,10.47 7.53,9.8M2,4.27L4.28,6.55L4.73,7C3.08,8.3 1.78,10 1,12C2.73,16.39 7,19.5 12,19.5C13.55,19.5 15.03,19.2 16.38,18.66L16.81,19.08L19.73,22L21,20.73L3.27,3M12,7A5,5 0 0,1 17,12C17,12.64 16.87,13.26 16.64,13.82L19.57,16.75C21.07,15.5 22.27,13.86 23,12C21.27,7.61 17,4.5 12,4.5C10.6,4.5 9.26,4.75 8,5.2L10.17,7.35C10.74,7.13 11.35,7 12,7Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-key" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#929394" d="M7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14M12.65,10C11.83,7.67 9.61,6 7,6A6,6 0 0,0 1,12A6,6 0 0,0 7,18C9.61,18 11.83,16.33 12.65,14H17V18H21V14H23V10H12.65Z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Confirm Password" id="resetpassword1" name="password" autocomplete="on">
                    </div>
                    <div class="hideshowpassword">
                        <div class="show" style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-eye" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#929394" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                            </svg>
                        </div>

                        <div class="hide">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-eye-off" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#929394" d="M11.83,9L15,12.16C15,12.11 15,12.05 15,12A3,3 0 0,0 12,9C11.94,9 11.89,9 11.83,9M7.53,9.8L9.08,11.35C9.03,11.56 9,11.77 9,12A3,3 0 0,0 12,15C12.22,15 12.44,14.97 12.65,14.92L14.2,16.47C13.53,16.8 12.79,17 12,17A5,5 0 0,1 7,12C7,11.21 7.2,10.47 7.53,9.8M2,4.27L4.28,6.55L4.73,7C3.08,8.3 1.78,10 1,12C2.73,16.39 7,19.5 12,19.5C13.55,19.5 15.03,19.2 16.38,18.66L16.81,19.08L19.73,22L21,20.73L3.27,3M12,7A5,5 0 0,1 17,12C17,12.64 16.87,13.26 16.64,13.82L19.57,16.75C21.07,15.5 22.27,13.86 23,12C21.27,7.61 17,4.5 12,4.5C10.6,4.5 9.26,4.75 8,5.2L10.17,7.35C10.74,7.13 11.35,7 12,7Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </form>
            <div class="warning_message">
                <p>Example Password: Abcd@123#</p>
            </div>
        </div>

        <div class="footer">
            <button class="resetpassword11" id="register" type="button" style="width: 250px;">Reset Password</button>

        </div>
    </div>

    <div class="message_panel" style="display: none;">
        <p class="message_content" id="message_content">Message Goes Here</p>
    </div>

    <script>
        //hide show password for signup page
        $(".hideshowpassword .hide").click(function() {
            $(".hideshowpassword .hide").hide();
            $(".hideshowpassword .show").show();
            $("#resetpassword").attr("type", "text");
            $("#resetpassword1").attr("type", "text");
        });

        $(".hideshowpassword .show").click(function() {
            $(".hideshowpassword .hide").show();
            $(".hideshowpassword .show").hide();
            $("#resetpassword").attr("type", "password");
            $("#resetpassword1").attr("type", "password");
        });

        $('#resetpassword').keyup(function() {
            if ($(this).val().length >= 6) {
                if (/^[A-Za-z0-9\d=!\-@._*]*$/.test($(this).val()) && /[a-z]/.test($(this).val()) && /\d/.test($(this).val()) && /[A-Z]/.test($(this).val())) {
                    $(this).parent().parent().css("border", "1px solid #007000");
                } else {
                    $(this).parent().parent().css("border", "1px solid #990000");
                }
            } else {
                $(this).parent().parent().css("border", "1px solid #990000");
            }
        });
        $('#resetpassword1').keyup(function() {
            if ($('#resetpassword').val() == $(this).val()) {
                $(this).parent().parent().css("border", "1px solid #007000");
            } else {
                $(this).parent().parent().css("border", "1px solid #990000");

            }
        });

        $('.resetpassword11').click(function() {
            var password = $('#resetpassword').val();
            var confirmpassword = $('#resetpassword1').val();

            if (password.length >= 6) {
                if (/^[A-Za-z0-9\d=!\-@._*]*$/.test(password) && /[a-z]/.test(password) && /\d/.test(password) && /[A-Z]/.test(password)) {
                    if (password == confirmpassword) {

                        $.post(
                            "./controlller/resetpass.php", {
                                user_id: user__id,
                                password: password
                            },
                            function(data, status) {
                                console.log(data);

                                $("#message_content").text(data);
                                $(".message_panel").show();
                                setTimeout(function() {
                                    $(".message_panel").fadeOut();
                                    window.location = "http://localhost/trada/view/login/";
                                }, 2500);
                            }
                        );

                    } else {
                        $("#resetpassword1").parent().parent().css("border", "3px solid #990000");
                        $("#message_content").text("Password Not Match");
                        $(".message_panel").show();
                        setTimeout(function() {
                            $(".message_panel").fadeOut();
                            $("#resetpassword1").parent().parent().css("border", "1px solid #990000");
                        }, 2500);
                    }
                    $("#resetpassword").parent().parent().css("border", "1px solid #007000");
                } else {
                    $("#resetpassword").parent().parent().css("border", "3px solid #990000");
                    $("#message_content").text("Password Should be 1-UpperCase, 1-Lowercase, 1-number, 1-special Character");
                    $(".message_panel").show();
                    setTimeout(function() {
                        $(".message_panel").fadeOut();
                        $("#resetpassword").parent().parent().css("border", "1px solid #990000");
                    }, 2500);

                }
            } else {
                $("#resetpassword").parent().parent().css("border", "3px solid #990000");
                $("#message_content").text("Password Should be Minimum 6 Digit");
                $(".message_panel").show();
                setTimeout(function() {
                    $(".message_panel").fadeOut();
                    $("#resetpassword").parent().parent().css("border", "1px solid #990000");
                }, 2500);
            }
        })
    </script>
</body>

</html>