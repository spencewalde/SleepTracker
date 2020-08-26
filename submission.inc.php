<!-- 
    Spencer Williams-Waldemar
    08/5/20
    submission.inc.php
    PHP file for submission.php takes in input from the user and enters it into a database  
 -->
<?php
require 'dbh.inc.php';
session_start();

//if new entry button is pressed 
if (isset($_POST['newentry'])) {
    //set variables from submission.php --> input
    $userID = $_SESSION['userID'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $hoursslept = $_POST['hoursslept'];

    //set sql statement for insert into a variable and initiate connection
    $sql = "INSERT INTO info (userID, entryyear, entrymonth, entryday, hoursslept) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    // if prepared statement does not work exit user to submission.php with error message in url
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../submission.php?error=sqlerror");
        exit();
    }
    // if prepared statment works then bind the user's entries to the sql statment and enter the information into database
    else {
        mysqli_stmt_bind_param($stmt, "iiiii", $userID, $year, $month, $day, $hoursslept);
        mysqli_stmt_execute($stmt);

        //sends user success message in url
        header("Location: ../submission.php?entry=success");
        exit();
    }
}
//if new entry button was never clicked bring back to submission page
else {
    header("Location: ../submission.php");
    exit();
}
