<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
		$cardtype= $_POST['cardtype'];
		$reqtype= $_POST['reqtype'];
		

        if($name == '' || $clientaccountno  == '' || $cardtype == '' || $reqtype == ''  )
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

			if($clientaccountno != ($_SESSION['accno']))
			{
				echo 'Account no does not match <br>';
				$errorflag=true;
			}
			if($name != ($_SESSION['name']))
			{
				echo 'Account name does not match <br>';
				$errorflag=true;
			}

		}
		if(($errorflag == false))
		{
			$conn = mysqli_connect('localhost', 'root', '', 'bms');
			if($conn == null){
				die('DB connection error!');
			}
			$sql = "SELECT * FROM card WHERE Name = '{$_SESSION['name']}' && AccNo = '{$_SESSION['accno']}'" ;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if($row['cardtype']!=$cardtype)

			{
				
			$sql = "INSERT INTO `card`(`name`, `AccNo`, `cardtype`,`reqtype`) VALUES ('$name', '$clientaccountno', '$cardtype','$reqtype')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: clientcard.php');
			}
			else
			{
				echo "something wrong...";
			}
			}
			else
			{
				echo"Card already exist";
			}
		}
    }
?>
