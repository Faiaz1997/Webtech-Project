<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
		$cardtype= $_POST['cardtype'];
        $status = $_POST['status'];
		

        if($name == '' || $clientaccountno  == '' || $cardtype == '' )
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

		}
		if(($errorflag == false))
		{
			$conn = mysqli_connect('localhost', 'root', '', 'bms');
			if($conn == null){
				die('DB connection error!');
			}
			
			$sql = "UPDATE card set status= '$status' WHERE AccNo = '{$_SESSION['accno']}' && cardtype = '$cardtype'" ;
					$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: cardupdate.html');
			}
			else
			{
				echo "something wrong...";
			}
		
		}
    }
?>
