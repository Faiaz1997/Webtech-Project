<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
		$withdrawammount = $_POST['withdrawammount'];
        $password = $_POST['password'];

        if($name == '' || $clientaccountno == '' || $withdrawammount == '' || $password == '' )
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

            $withdrawammountflag=false;
	
			for($i=0;$i<strlen($withdrawammount);$i++)
			{
				if(($withdrawammount[$i] >= 0 ) && ($withdrawammount[$i] <= 9 ))
				{
                    $withdrawammountflag=true;				         
				}
			}
			if($withdrawammountflag == false)
			{
				echo 'Invalid Ammount Format<br>';
				$errorflag=true;
			}
			if($name!= ($_SESSION['name']))
			{
				echo 'Name does not match <br>';
				$errorflag=true;
			}
			if($password != ($_SESSION['pass']))
			{
				echo 'Password does not match <br>';
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
			$sql = "SELECT * FROM registration WHERE Name = '{$_SESSION['name']}' && AccNo = '{$_SESSION['accno']}'" ;
            $result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if($row['Deposit']>$withdrawammount)
			{
				$sql = "UPDATE registration set Deposit= (Deposit-'$withdrawammount') WHERE Name = '{$_SESSION['name']}' 
				&& AccNo = '{$_SESSION['accno']}'" ;
				$result = mysqli_query($conn, $sql);
				$sql = "SELECT * FROM registration WHERE Name = '{$_SESSION['name']}' && AccNo = '{$_SESSION['accno']}'" ;
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$balance = $row['Deposit'];
				if($result)
				{
					$sql = "INSERT INTO `transaction`(`AccNo`,`transactionId`, `senderid`, `receiverid`, `type`, `credit`, `debit`, `balance`) 
					VALUES ('{$_SESSION['accno']}',NULL, 'None','None','Withdraw','NULL','$withdrawammount','$balance')";
					$result = mysqli_query($conn, $sql);
					if($result)
					{
						header('location: clientfundwithdraw.html');
					}
					else
					{
						echo "Something wrong...";
					}
				}
				else
				{
					echo "Something wrong...";
				}
				
			}
			else
			{
                echo "Insufficient Balance";
            }
			
			
		}



       
       
    }
?>