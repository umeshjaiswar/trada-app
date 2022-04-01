<?php
include('../../constant.php');
session_start();
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] == true){
        header("Location: http://localhost/trada/view/dashboard/");
    }
}
// var_dump($_SESSION);
// session_unset();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trada - Login</title>
    <link rel="stylesheet" href="style.css">

    <!-- jquery cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <div class="start_page">
        <h3>TRADA</h3>
        <p>TRADE ANYTIME ANYWHERE</p>
        <div class="buttons">
            <button id="signupbtn">SIGNUP</button>
            <button id="loginbtn">LOGIN</button>
        </div>
    </div>

    <div class="signup_panel signup_">
        <div class="heading backbtn">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="#FFFFFF" d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                </svg>
            </div>
            <p>Back</p>
        </div>

        <div class="content">
            <h3>SIGNUP</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path fill="#929394" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-6.54 4.09c-.65.41-1.47.41-2.12 0L4.4 8.25c-.25-.16-.4-.43-.4-.72 0-.67.73-1.07 1.3-.72L12 11l6.7-4.19c.57-.35 1.3.05 1.3.72 0 .29-.15.56-.4.72z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email" id="signupemail" name="email">
                    </div>
                </div>

                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-key" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#929394" d="M7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14M12.65,10C11.83,7.67 9.61,6 7,6A6,6 0 0,0 1,12A6,6 0 0,0 7,18C9.61,18 11.83,16.33 12.65,14H17V18H21V14H23V10H12.65Z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" id="signuppassword" name="password" autocomplete="on">
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
            <button id="register" type="button">Register</button>
            <button id="login" type="button">Login</button>
        </div>
    </div>

    <div class="signup_panel login_">
        <div class="heading backbtn">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="#FFFFFF" d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                </svg>
            </div>
            <p>Back</p>
        </div>

        <div class="content">
            <h3>LOGIN</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path fill="#929394" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-6.54 4.09c-.65.41-1.47.41-2.12 0L4.4 8.25c-.25-.16-.4-.43-.4-.72 0-.67.73-1.07 1.3-.72L12 11l6.7-4.19c.57-.35 1.3.05 1.3.72 0 .29-.15.56-.4.72z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email" id="loginemail" name="email">
                    </div>
                </div>

                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-key" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#929394" d="M7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14M12.65,10C11.83,7.67 9.61,6 7,6A6,6 0 0,0 1,12A6,6 0 0,0 7,18C9.61,18 11.83,16.33 12.65,14H17V18H21V14H23V10H12.65Z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" id="loginpassword" name="password" autocomplete="on">
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
        </div>

        <div class="footer">
            <button class="loginbutton" id="register" type="button">Login</button>
            <button class="resetbutton" id="login" type="button" style="width: 230px;">Reset Password</button>
        </div>
    </div>

    <div class="signup_panel reset_">
        <div class="heading backbtn">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="#FFFFFF" d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                </svg>
            </div>
            <p>Back</p>
        </div>

        <div class="content">
            <h3>RESET PASSWORD</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path fill="#929394" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-6.54 4.09c-.65.41-1.47.41-2.12 0L4.4 8.25c-.25-.16-.4-.43-.4-.72 0-.67.73-1.07 1.3-.72L12 11l6.7-4.19c.57-.35 1.3.05 1.3.72 0 .29-.15.56-.4.72z" />
                        </svg>
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email" id="resetemail" name="email">
                    </div>
                </div>
            </form>
        </div>

        <div class="footer">
            <button class="resetpasswordbutton" id="register" type="button" style="width: 230px;">Reset Password</button>
            <button class="resetloginbtn" id="login" type="button" >Login</button>
        </div>
    </div>

    <div class="message_panel" style="display: none;">
        <p class="message_content" id="message_content">Message Goes Here</p>
    </div>

    <script src="./login.js"></script>
</body>

</html>