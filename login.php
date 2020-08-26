<!-- Spencer Williams-Waldemar
     08/5/20
     Login.php
     This page sets up a page where a user can either login or register into the database 
-->
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Spencer Williams-Waldemar">
    <title>Snooze</title>
    <link rel="stylesheet" type="text/css" href="./styles/loginstyle.css">

</head>

<body>
    <section class="page">

        <!-- title box  -->
        <div class="title-text-box">
            <div class="title-text">
                <h1>Snooze</h1>
            </div>
        </div>
        <!-- title box end -->

        <!-- box for buttons and input -->
        <div class="form-box">

            <!-- button box at the top of form box -->
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <!-- button box end -->


            <!-- PHP -->
            <!-- the Login error messages sent to url -->
            <?php
            if (isset($_GET['error'])) {
                // wrong password
                if ($_GET['error'] == "wrongpwd") {
                    echo '<p class="signuperror"> invalid password</p>';
                }
                // user does not exist
                if ($_GET['error'] == "nouser") {
                    echo '<p class="signuperror"> user does not exist</p>';
                }
            }
            ?>
            <!-- end PHP -->



            <!-- LOGIN form start -->
            <form action="includes/login.inc.php" id="login" class="input-group" method="post">
                <input type="text" name="mailuname" class="input-field" placeholder="Enter Username" required>
                <input type="password" name="pwd" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="checkbox">
                <span>Remember Password</span>
                <button type="submit" name="login-submit" class="submit-btn">Log in</button>
            </form>
            <!-- login form end -->



            <!-- PHP -->
            <!-- the registration error messages sent to url -->
            <?php
            if (isset($_GET["error"])) {
                // your user name and email were incorrect
                if ($_GET["error"] == "invalidmailuname") {
                    echo '<p class="signuperror"> Invalid username and email!</p>';
                }
                // your email was invalid
                if ($_GET["error"] == "invalidmail") {
                    echo '<p class="signuperror"> Invalid email!</p>';
                }
                // your username was invalid
                if ($_GET["error"] == "invaliduname") {
                    echo '<p class="signuperror"> Invalid username!</p>';
                }
                //your passwords did not match
                if ($_GET["error"] == "passwordcheck") {
                    echo '<p class="signuperror"> passwords are not the same!</p>';
                }
                // your username has already been taken by another user
                if ($_GET["error"] == "usertaken") {
                    echo '<p class="signuperror"> Username is already taken</p>';
                }
            }
            // signup was successful then display on the screen 
            elseif (isset($_GET["signup"])) {
                if ($_GET['signup'] == "success") {
                    echo '<p class="success"> signup was successful</p>';
                }
            }

            ?>
            <!-- end of PHP -->



            <!-- REGISTRATION form start -->
            <form action="includes/signup.inc.php" id="register" class="input-group" method="post">
                <input type="text" name="uname" class="input-field" placeholder="Username" required>
                <input type="text" name="mail" class="input-field" placeholder="Email" required>
                <input type="password" name="pwd" class="input-field" placeholder="Enter Password" required>
                <input type="password" name="pwd-repeat" class="input-field" placeholder="repeat password" required>
                <input type="checkbox" class="checkbox">
                <span>I agree to the terms and conditions</span>
                <button type="submit" name="signup-submit" class="submit-btn">Register</button>
            </form>
            <!-- registration form end -->
        </div>

    </section>
    <!-- END SECTION -->

    <!-- javascript for switching between login form and registration form using toggle button -->
    <script src="scripts/script.js"> </script>
</body>

</html>