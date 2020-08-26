<!-- 
    Spencer Williams-Waldemar
    08/5/20
    logout.inc.php
    PHP file to that is called by either home.php, history.php, or submission.php 
 -->
<?php

// if logout-btn is pressed from the sidebar end session and destroy
// send user back to login screen
if (isset($_POST['logout-btn'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../login.php");
} else {
    header("Location: ../login.php?error=logouterror");
}
