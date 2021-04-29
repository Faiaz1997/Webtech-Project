<?php

include 'dbcon.php';

$AccNo = $_GET['AccNo'];

$q = " DELETE FROM `registration` WHERE empno = $AccNo ";

mysqli_query($con, $q);

header('location: manage client.php');

?>