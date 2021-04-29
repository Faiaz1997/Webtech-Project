<?php

include 'dbcon.php';

$empno = $_GET['empno'];

$q = " DELETE FROM `stuff` WHERE empno = $empno ";

mysqli_query($con, $q);

header('location: managestuff.php');

?>