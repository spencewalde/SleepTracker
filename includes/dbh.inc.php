<!-- 
    Spencer Williams-Waldemar
    08/5/20
    dbh.inc.php
    php file for connecting to the database with your database user  
 -->

<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "#######";
$dbName = "######";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
