<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['Delete']))
	{
        $name = $_POST['name'];
        $clientaccountno = $_POST['clientaccountno'];
		$cardtype= $_POST['cardtype'];

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


		}
		if(($errorflag == false))
		{
			$conn = mysqli_connect('localhost', 'root', '', 'bms');
			if($conn == null){
				die('DB connection error!');
			}
			
			$sql = "DELETE FROM card WHERE AccNO='$clientaccountno ' && cardtype='$cardtype' && name='$name'" ;
					$result = mysqli_query($conn, $sql);
			if($result)
			{
				header('location: carddelete.html');
			}
			else
			{
				echo "something wrong...";
			}
		
		}
    }
?>
