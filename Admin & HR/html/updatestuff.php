<?php

include 'dbcon.php';

if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
        $password = $_POST['password'];
        $gender	= $_POST['gender'];
        $dob = $_POST['dob'];
		$position = $_POST['position'];


		$empno = $_GET['empno'];

			$sql = "UPDATE `stuff` SET `Name`=$name,`Email`=$email,`Address`=$address,`Phone`=$phone,`Salary`=$salary,`Position`=$position,`DOB`=$dob,`Pass`=$password WHERE empno = $empno";
			$result = mysqli_query($conn, $sql);

		header('location: managestuff.php');
	}

?>



