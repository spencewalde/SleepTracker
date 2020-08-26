<?php
/*
spencer williams-waldemar
8/3/20
this file takes the input of the registration form in "login.php", does error
handling and submits the registration form to sql and is added to the database 
if all field are correctly inputed
*/

//if the submit button is pushed under registration form
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    //variables grabbed from login.php -> registration form
    $username = $_POST['uname'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // MAIN ERROR HANDLERS
    // checks for any empty fields in the form
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../login.php?error=emptyfields&uname=" . $username . "&mail=" . $email);
        exit();
    }
    // checks for a invalid email and username and if thats true the sends user back to login with error
    elseif (
        !filter_var($email, FILTER_VALIDATE_EMAIL) &&
        !preg_match("/^[a-zA-Z0-9]*$/", $username)
    ) {
        header("Location: ../login.php?error=invalidmailuname");
        exit();
    }

    // checks for a invaild email and sends the valid username entered back to the url to be reused
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.php?error=invalidmail&uname=" . $username);
        exit();
        // checks for invalid username and sends the valid email entered to the url to be reused
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login.php?error=invaliduname&mail=" . $email);
        exit();
    }
    // checks that the password repeat is correct. if not sends email and username to url for reuse
    elseif ($password !== $passwordRepeat) {
        header("Location: ../login.php?error=passwordcheck&uname=" . $username . "&mail=" . $email);
        exit();
    }
    // END MAIN ERROR HANDLERS


    // if input field are all correct check sql's side
    else {
        //finds all userIDs that are the same as the one entered on the registration form
        $sql = "SELECT userID FROM user WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        // check if the select statement above failed
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        // binds username information from user to statement
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            // checks if the username is taken in the database
            if ($resultcheck > 0) {
                header("Location: ../login.php?error=usertaken&mail=" . $email);
                exit();
            }
            // if username is not taken then insert information into database
            else {
                $sql = "INSERT INTO user (username, email, pwd) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                // if the insert statement failed
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                // adds the user information to a new row using select statement 
                // hashes password before being inserted 
                else {
                    //hashes password so the real password is not visable
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
// END OF SUBMIT-BTN IF STATEMENT



// if the submit button was not clicked then return to the login page
else {
    header("Location: ../login.php");
    exit();
}
