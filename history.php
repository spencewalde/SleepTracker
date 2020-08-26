<!-- Spencer Williams-Waldemar
     08/5/20
     history.php
     This page allows for a user to see all of their previous sleep entries
 -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>

<!-- head start -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Spencer Williams-Waldemar">
    <!-- link to css files -->
    <link rel="stylesheet" type="text/css" href="./styles/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./styles/history.css">
    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/5fcb7073bf.js" crossorigin="anonymous"></script>

    <!-- title -->
    <title>Snooze</title>

    <!-- FUTURE WORK script to link to google charts information to be able to display chart of data -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->


    <!-- styling for the table outputs from php -->
    <style type="text/css">
        table {
            border: 2px solid #417ed8;
            border-radius: 5px;
            background-color: #a5a9c7;
            width: 50%;
            height: 500px;
            transform: translate(600px, -250px);
        }

        th {
            border-bottom: 5px solid #417ed8;
            border-radius: 5px;
            border-right: 5px solid #417ed8;
            height: 20px auto;
        }

        td {
            border-bottom: 2px solid #417ed8;
            border-radius: 5px;
            border-right: 2px solid #417ed8;
            text-align: center;
            height: 20px auto;
        }
    </style>



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

        <!-- box for the output from php to go into -->
        <div id="table-box">

            <!-- PHP start -->
            <!-- gets database information if you are logged in and puts 
                 and puts it into table tags-->
            <?php
            // link php file that connects to database
            require 'includes/dbh.inc.php';
            // gets the user id needed from when you login
            $userID = $_SESSION['userID'];

            ////FUTUREWORK set array
            //$data = array();;

            // starts the table and its header information
            echo "<table>";
            echo "<tr><th>Date</th><th>Hours of sleep</th></tr>";

            //connects to database using dbh.inc.php variables 
            $stmt = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

            //if connection does work == error message
            if ($stmt->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //sets a sql query statment as a variable 
            $sql = "SELECT entryday,entrymonth,entryyear,hoursslept FROM info WHERE userID=$userID";

            //uses the connection to send the query to the database
            $result = $stmt->query($sql);

            //if the database is not empty
            if ($result->num_rows > 0) {

                // outputs each row of data 
                while ($row = $result->fetch_assoc()) {
                    //outputs the row of data into table tags
                    echo '<tr><td>';
                    echo $row["entryday"] . "/" . $row['entrymonth'] . "/" . $row['entryyear'];
                    echo '</td><td>';
                    echo $row["hoursslept"] . ' hours';
                    echo '</td></tr>';

                    ////////FUTURE WORK PUTTING VARIBLES INTO AN ARRAY TO PASS TO JAVASCRIPT
                    // $strdate = $row["entryday"] . $row['entrymonth'] . $row['entryyear'];
                    // $strhours = $row['hoursslept'];
                    // array_push($data, $strdate, $strhours);
                }


                // if the number of rows in the database == 0 they dispay that there are no entries
            } else {
                header("Location: ../history.php?Database=0results");
                exit();
            }
            // if statement end


            //////////FUTURE WORK ARRAY OUTPUT
            // foreach ($data as $key => $value) {
            //     if ($key % 2 == 0) {
            //         echo "index:" . $key . ", date:" . $value;
            //         echo "<br>";
            //     }
            //     if ($key % 2 == 1) {
            //         echo "index:" . $key . ", hours:" . $value;
            //         echo "<br>";
            //     }
            // }

            //close connection to database
            $conn->close();
            exit();
            ?>
            <!-- end of php -->

        </div>
        <!-- end of "table-box" -->




        <!--   FUTURE WORK-- MAKE A CHART WITH THE DATA  -->
        <!-- <div id="curve_chart" style="width: 900px; height: 500px"> -->

        <!-- <script>
            var a = 'a';
                console.log(a);
                var dataarray = <php echo json_encode($data) ?>;

                alert(dataarray[0][1]);
                for (var i = 0; i < dataarray.length; i++) {
                    console.log(dataarray[i]);
                    console.log('we got here');
                }
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);


                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        ['2004', 1000, 400],
                        ['2005', 1170, 460],
                        ['2006', 660, 1120],
                        ['2007', 1030, 540]
                    ]);

                    var options = {
                        title: 'Company Performance',
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
            </script> -->


    </section>
    <!-- page end -->

</body>

</html>