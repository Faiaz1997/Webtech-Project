<?php
	session_start();
	include('dbcon.php');
	
	//if(isset($_POST['username'])){

		$subject 	= $_POST['subject'];
		$details 	= $_POST['details'];

		if($subject == '' && $details == '')
		{
			echo 'Null Field Submission';
		}

		else
		{
			$sql = "INSERT INTO `notice` (`subject`, `details`) VALUES ('$subject', '$details')";
			mysqli_query($con, $sql);
		}

?>