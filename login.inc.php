<!-- 
    Spencer Williams-Waldemar
    08/5/20
    login.inc.php
    PHP file for login.php that allows connection to the database
    using dbh.inc.php.   
 -->

<?php
// if the "login-submit" button is clicked 
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    //set variables from login.php --> inputs 
    $mailuname = $_POST['mailuname'];
    $password = $_POST['pwd'];

    // if email and password input fields are empty then return with error in url
    if (empty($mailuname) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {

        // set sql SELECT statement as variable and initiate connection
        $sql = "SELECT * FROM user WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        // check prepared statement to put into the sql stmt
        // if they is an error preparing the staetment return error in url
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error");
            exit();
        }

        // if prepared statement worked
        else {

            // bind the $mailuname(username on login entry) to the sql statement and execute
            mysqli_stmt_bind_param($stmt, "s", $mailuname);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);

            // check the results of the sql statement and compare to that of the user input
            if ($row = mysqli_fetch_assoc($results)) {

                // checks if password from the database is the same as the password entered
                $pwdcheck = password_verify($password, $row['pwd']);

                //if its the wrong password send back to login with error message
                if ($pwdcheck == false) {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }

                // if password is correct start session and put username and user id into the session
                // send user to home page with login success message
                elseif ($pwdcheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../home.php?login=success");
                    exit();
                }
            }

            // if the if statement came back false for finding a user with the input user name
            // send user back to login page with a no user error
            else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
}

// if submit button was not clicked send back to login.php
else {
    header("Location: ../login.php");
    exit();
}
