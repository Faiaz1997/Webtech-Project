<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
        $contact = $_POST['contact'];
		$text = $_POST['text'];


        if($name == '' || $clientaccountno == '' || $contact == '' || $text == '' )
        {
            echo "Null Submission<br>";
			$errorflag=true;
        }
	else
	{

		$clientaccflag=false;

		for($i=0;$i<strlen($clientaccountno);$i++)
		{
			if(($clientaccountno[$i] >= 0 ) && ($clientaccountno[$i] <= 9 ))
			{
					$clientaccflag=true;				         
			}
		}
		if($clientaccflag == false)
		{
			echo 'Invalid Account Number Format<br>';
			$errorflag=true;
		}
		if($name!= ($_SESSION['name']))
		{
			echo 'Name does not match <br>';
			$errorflag=true;
		}
		if($clientaccountno != ($_SESSION['accno']))
		{
			echo 'Account no does not match <br>';
			$errorflag=true;
		}
		
		}
		if(($errorflag == false))
		{
			
			$conn = mysqli_connect('localhost', 'root', '', 'bms');
			if($conn == null)
			{
			die('DB connection error!');
			}
			$sql = "INSERT INTO `contact`(`name`, `AccNo`, `contact`, `text`) VALUES ('$name', $clientaccountno, '$contact','$text')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: contactadmin.html');
			}
			else
			{
				echo "something wrong...";
			} 			
		}
		else
			{
				echo "invalid Request";
			}
	}

?>