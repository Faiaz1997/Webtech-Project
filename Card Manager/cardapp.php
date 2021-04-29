<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $contact = $_POST['contact'];
		$text = $_POST['text'];


        if($name == '' || $contact == '' || $text == '' )
        {
            echo "Null Submission<br>";
			$errorflag=true;
        }
	else
	{

		if($name!= ($_SESSION['name']))
		{
			echo 'Name does not match <br>';
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
			$sql = "INSERT INTO `application`(`name`, `contact`, `text`) VALUES ('$name','$contact','$text')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: cardapp.html');
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