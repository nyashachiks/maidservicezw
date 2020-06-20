<?php
require('db_connect.php');
$q= "UPDATE users SET password=md5('chichi'), WHERE username='cchikomwe@gmail.com'";
$r= mysqli_query($dbhandle, $q);
?>