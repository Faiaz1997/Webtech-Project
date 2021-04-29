<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
        $loantype = $_POST['loantype'];
		$loanpurpose = $_POST['loanpurpose'];
		$loanammount = $_POST['loanammount'];

        if($name == '' || $clientaccountno == '' || $loantype == '' || $loanpurpose == '' || $loanammount == '' )
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
		$loanammountflag=false;

		for($i=0;$i<strlen($loanammount);$i++)
		{
			if(($loanammount[$i] >= 0 ) && ($loanammount[$i] <= 9 ))
			{
				$loanammountflag=true;				         
			}
		}
		if($loanammountflag == false)
		{
			echo 'Invalid Ammount Format<br>';
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
			$sql = "INSERT INTO `loan`(`name`, `AccNo`, `type`, `purpose`, `ammount`) VALUES ('$name', $clientaccountno, 
			'$loantype','$loanpurpose ', '$loanammount')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: applyloan.html');
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