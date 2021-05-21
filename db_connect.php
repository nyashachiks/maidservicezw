<?php
$username = "maidservice";
$password = "o@4DgGhbnb%DCWt@";
$hostname = "srv-captain--mysql-db";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
echo "";

//select a database to work with
$selected = mysqli_select_db($dbhandle, "maidservice")
  or die("Could not select database");
?>
