<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $receivername = $_POST['receivername'];
        $clientaccountno = $_POST['clientaccountno'];
        $receiveraccno = $_POST['receiveraccno'];
		$transferammount = $_POST['transferammount'];
        $password = $_POST['password'];
		$conn = mysqli_connect('localhost', 'root', '', 'bms');
		if($conn == null)
			{
				die('DB connection error!');
			}
	
			$_SESSION['rname'] = $receivername;
			$_SESSION['raccno'] = $receiveraccno;
		

        if($name == '' || $clientaccountno == '' || $transferammount == '' || $password == '' ||$receivername == ''  || $receiveraccno  == ''  )
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
			$rcvaccflag=false;
            
			for($i=0;$i<strlen($receiveraccno);$i++)
			{
				if(($receiveraccno[$i] >= 0 ) && ($receiveraccno[$i] <= 9 ))
				{
					$rcvaccflag=true;				         
				}
			}
			if($rcvaccflag == false)
			{
				echo 'Invalid Receiver Account Number Format<br>';
				$errorflag=true;
			}

            $transferammountflag=false;
	
			for($i=0;$i<strlen($transferammount);$i++)
			{
				if(($transferammount[$i] >= 0 ) && ($transferammount[$i] <= 9 ))
				{
                    $transferammountflag=true;				         
				}
			}
			if($transferammountflag == false)
			{
				echo 'Invalid Ammount Format<br>';
				$errorflag=true;
			}
			if($name!= ($_SESSION['name']))
			{
				echo 'Name does not match <br>';
				$errorflag=true;
			}
			if($receivername!= ($_SESSION['rname']))
			{
				echo 'Receiver Name does not match <br>';
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
			if($receiveraccno != ($_SESSION['raccno']))
			{
				echo 'Receiver account no does not match <br>';
				$errorflag=true;
			}
			if(($errorflag == false))
			{
			
				$sql = "SELECT * FROM registration WHERE Name = '{$_SESSION['name']}' && AccNo = '{$_SESSION['accno']}'" ;
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if($row['Deposit']>$transferammount)
				{
					$sql = "UPDATE registration set Deposit= (Deposit-'$transferammount') WHERE Name = '{$_SESSION['name']}' 
					&& AccNo = '{$_SESSION['accno']}'" ;
					$result = mysqli_query($conn, $sql);
					if($result)
					{
						$sql = "UPDATE registration set Deposit= (Deposit+'$transferammount') WHERE Name = '$receivername' && AccNo = '$receiveraccno'" ;
						$result = mysqli_query($conn, $sql);
						$sql = "SELECT * FROM registration WHERE Name = '{$_SESSION['name']}' && AccNo = '{$_SESSION['accno']}'" ;
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						$balance = $row['Deposit'];
						if($result)
						{
							$sql = "INSERT INTO `transaction`(`AccNo`,`transactionId`, `senderid`, `receiverid`, `type`, `credit`, `debit`, `balance`) 
							VALUES ('{$_SESSION['accno']}',NULL, '{$_SESSION['accno']}','$receiveraccno','Transfer','NULL','$transferammount','$balance')";
							$result = mysqli_query($conn, $sql);
							
							$sql = "SELECT * FROM registration WHERE Name = '$receivername' && AccNo = '$receiveraccno'" ;
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							$balance = $row['Deposit'];
							
							$sql = "INSERT INTO `transaction`(`AccNo`,`transactionId`, `senderid`, `receiverid`, `type`, `credit`, `debit`, `balance`) 
							VALUES ('$receiveraccno',NULL, '{$_SESSION['accno']}','$receiveraccno','Transfer','$transferammount','NULL','$balance')";
							$result = mysqli_query($conn, $sql);
						
							if($result)
							{
								header('location: clientfundtransfer.html');
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
						echo "Something wrong...";
					}
				}
				else
				{
					echo "Insufficient Balance";
				}
			}
		}
    }
?>