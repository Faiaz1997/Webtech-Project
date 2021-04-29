<?php

	$con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) 
    {
        exit('Could not connect');
    }

$empno = $_GET['empno'];

$q = " DELETE FROM `employee` WHERE empno = $empno ";

mysqli_query($con, $q);

header('location:manage.php');

?>