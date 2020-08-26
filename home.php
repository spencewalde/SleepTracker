<!-- Spencer Williams-Waldemar
     08/5/20
     home.php
     This page is a landing/navigation page that 
 -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Spencer Williams-Waldemar">
    <link rel="stylesheet" type="text/css" href="styles/home.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
    <script src="https://kit.fontawesome.com/5fcb7073bf.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- page start -->
    <section class="page">

        <!-- sidebar -->
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <br>

        <div class="sidebar">
            <header>Sleep Tracker</header>
            <ul>
                <li><a href="./home.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="./submission.php"><i class="fas fa-history"></i> New Sleep Record</a></li>
                <li><a href="./history.php"><i class="fas fa-history"></i> Sleep history</a></li>
                <li><a href="includes/logout.inc.php" method="post"><i class="fa fa-sign-out"></i> Log out</a></li>
            </ul>
        </div>
        <!-- end sidebar -->

        <!-- contains a box that hold the title  -->
        <div class="home-header-box">
            <div class="header-box">
                <button class="header-home-btn" disabled><a href="./home.php"></a> Welcome To Snooze</button>
            </div>
        </div>
        <!-- end header box -->

        <!-- contains a discription of the website and nav info -->
        <div class="description">
            <div class="description-box">
                <p class="description-text">
                    This application strives to help you track and monitor your sleep. Click the "Add New Sleep Record" below to keep your sleep records up to date or click "your sleep" to see your previous history
                </p>
            </div>
        </div>
        <!-- description box end -->

        <!-- container for the navigation buttons  -->
        <div class="references">
            <div class="refaddnew-box">
                <button class="ref-btn"><a href="./submission.php">Add New Sleep Record</a></button>
            </div>
            <div class="refhistory-box">
                <button class="ref-btn"><a href="./history.php">Your Sleep</a></button>
            </div>



            <!-- FUTURE WORK ACCOUNT BUTTON -->
            <!-- <div class="refaccount-box">
                <button class="ref-btn"><a href="#">Account</a></button>
            </div> -->


        </div>
        <!-- end container for navigation -->

    </section>
    <!-- end of page -->

</body>

</html>