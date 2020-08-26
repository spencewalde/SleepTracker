<!-- Spencer Williams-Waldemar
     08/5/20
     submission.php
     This page allows for a user to enter in data to the data base after they have logged in 
 -->
<!DOCTYPE html>
<?php
session_start();
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Spencer Williams-Waldemar">
    <link rel="stylesheet" type="text/css" href="./styles/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./styles/submission.css">
    <!-- font awesome script -->
    <script src="https://kit.fontawesome.com/5fcb7073bf.js" crossorigin="anonymous"></script>
    <title>Snooze</title>
</head>

<body>
    <!-- section start -->
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


        <!-- input/submittion box -->
        <div class="form-box">
            <!-- Header box for in the forms box-->
            <div class="form-header-box">
                <h3 class="form-header">Enter New Sleep Record</h3>
            </div>
            <br>

            <!-- form start -->
            <form action="includes/submission.inc.php" method="post" id="input" class="input-group">
                <input name="day" type="number" class="input-field" id="day" min="1" max="31" placeholder="enter day of entry" required>
                <input name="month" type="number" class="input-field" id="month" min="1" max="12" placeholder="enter month of entry" required>
                <input name="year" type="number" class="input-field" id="year" min="2017" placeholder="enter year of entry" required>
                <input name="hoursslept" type="number" class="input-field" min='0' max='24' id="hoursslept" placeholder="Hours Slept" required>
                <!-- FUTURE WORK MORE DATA FROM THE USER -->
                <!-- <input name="quality" class="input-field" id="sleep-quality" required> -->
                <!-- <input name="quality" class="input-field" id="sleep-quality" required> -->

                <!-- submit button -->
                <div class="submit-btn-box">
                    <button name="newentry" id="sumbit-btn" class="submit-btn">Submit</button>
                </div>
            </form>
            <!-- form end -->

        </div>

    </section>
    <!-- section end -->

</body>

</html>