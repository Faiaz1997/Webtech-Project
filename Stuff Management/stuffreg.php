<?php
	session_start();
	$errorflag=false;

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

        if($name == '' || $email == '' || $address == '' || $phone == '' || $salary == '' || $password == '' || $gender == "" || $dob == '' || $position == '')
        {
            echo "Null Submission<br>";
			$errorflag=true;
        }
		else
		{
			$mailflag=false;
	
			for($i=0;$i<strlen($email);$i++)
			{
				if(($email[$i] == '@' ))
				{
					$mailflag=true;
				}
			}
			if($mailflag == false)
			{
				echo 'Invalid email Format<br>';
				$errorflag=true;
			}

			$phoneflag=false;
	
			for($i=0;$i<strlen($phone);$i++)
			{
				if(($phone[$i] >= 0 ) && ($phone[$i] <= 9 ))
				{
						$phoneflag=true;				         
				}
			}
			if($phoneflag == false)
			{
				echo 'Invalid phone number Format<br>';
				$errorflag=true;
			}

			$salaryflag=false;
		
			for($i=0;$i<strlen($salary);$i++)
			{
				if(($salary[$i] >= 0 ) && ($salary[$i] <= 9 ))
				{
						$salaryflag=true;				         
				}
			}
				if($salaryflag == false)
				{
					echo 'Invalid Salary';
					$errorflag=true;
				}
				

				if((strlen($salary) <2) || (strlen($salary) >5))
				{
					echo 'Invalid Salary Digit';
					$errorflag=true;
				}


			$positionflag=false;
	
			for($i=0;$i<strlen($position);$i++)
			{
				if(($position[$i] >= 0 ) && ($position[$i] <= 9 ))
				{
						$positionflag=true;				         
				}
			}
			if($positionflag == false)
			{
				echo 'Invalid position <br>';
				$errorflag=true;
			}

			if((strlen($phone) <7) || (strlen($phone) >11))
				{
					echo 'Invalid Number <br>';
					$errorflag=true;
				}

			$passflag=false;

			for($i=0;$i<strlen($password);$i++)
			{
				if(($password[$i] == '@' || 
				$password[$i] == '$' ||
				$password[$i] == '#' ||
				$password[$i] == '%')) 
				{
					$passflag=true;
				}
			}
	
			if($passflag == false)
			{
				echo 'Password must contain atleast one of the special characters (@, $, % or #!) <br>';
				$errorflag=true;
			}
			if(strlen($password) < 4)
			{
				echo 'Password must contain atleast 4 characters<br/>';
				$errorflag=true;
			}
			
		}
		if(($errorflag == false))
		{
			
				$conn = mysqli_connect('localhost', 'root', '', 'bms');
				if($conn == null){
					die('DB connection error!');
				}

				$sql = "INSERT INTO `employee` (`empno`, `Name`, `Email`, `Address`, `Phone`, `Salary`, `Position`, `Gender`,
				`DOB`, `Pass`) VALUES (NULL, '$name', '$email', '$address', '$phone', '$salary', '$position', '$gender', '$dob', 
				'$password')";
				$result = mysqli_query($conn, $sql);
				if($result)
				{
					header('location: dashboard.php');
				}
				else{
					echo "something wrong...";
				}

				
		}
		
       
       
    }
	else
		echo('nothing');

?>