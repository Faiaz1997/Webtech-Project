<?php
	session_start();
	$errorflag=false;

	if(isset($_POST['submit']))
	{
        $name = $_POST['name'];
        $email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmpass = $_POST['confirmpassword'];
        $gender		= $_POST['gender'];
        $dob = $_POST['dob'];
		$position = $_POST['position'];

        if($name == '' || $email == '' || $address == '' || $phone == '' || $password == '' || $confirmpass == '' || $gender == "" || $dob == '' 
		|| $position == '')
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
	
			if($password != $confirmpass)
			{
				echo "Confirmed password does't match with password<br>";
				$errorflag=true;
			}
			
		}
		if(($errorflag == false))
		{
				/*$user = [
					'name'		=>$name, 
					'password'	=>$password
				];

				$_SESSION['client'] = $user;*/
				$conn = mysqli_connect('localhost', 'root', '', 'bms');
				if($conn == null){
					die('DB connection error!');
				}

				$sql = "INSERT INTO `analytics` (`AccNo`, `Name`, `Email`, `Address`, `Phone`, `Position`, `Gender`,
				`DOB`, `Pass`, `Repass`) VALUES (NULL, '$name', '$email', '$address', '$phone', '$position', '$gender', '$dob', 
				'$password', '$confirmpass')";
				$result = mysqli_query($conn, $sql);
				if($result)
				{
					header('location: Login.html');
				}
				else{
					echo "something wrong...";
				}

				/*setcookie('name', $name, time()+3600, '/');
				setcookie('password', $password, time()+3600, '/');*/
				
		}
		
       
       
    }
	else
		echo('nothing');

?>