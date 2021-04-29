<?php
	session_start();

	
	//if(isset($_POST['submit'])){

		$name 	= $_POST['name'];
		$email 	= $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$add = $_POST['ads'];
		
		if($name == "" || $email == "" || $phonenumber == "" || $add == "")
		{
			
			echo "Null submission";
		}

		else
		{
			//if($name == $_COOKIE['name'] && $email == $_COOKIE['email']) && $phonenumber == $_COOKIE['phonenumber'] && $add == $_COOKIE['ads']
			{
				
				//$_SESSION['status'] = true;
				//setcookie('status', 'true', time()+5000, '/');


				/*

				setcookie('name', $name, time()+3600, '/');
				setcookie('email', $email, time()+3600, '/');
				setcookie('phonenumber', $phonenumber, time()+3600, '/');
				setcookie('ads', $add, time()+3600, '/');
				
				$_SESSION['name']=$name;
				$_SESSION['phonenumber']=$phonenumber;
				$_SESSION['email']=$email;
				$_SESSION['ads']=$add;
				*/
				
				  $hostname='localhost';
                  $username='root';
                  $userpass='';
                  $dbname='bms';

			    $con= mysqli_connect($hostname,$username,$userpass,$dbname) or die('Database connection error!');
			    $sql = "INSERT INTO `client` (`name`, `email`, `phone`, `add`) VALUES ('$name', '$email', '$phonenumber', '$add');";
			    mysqli_query($con, $sql);
    			$_SESSION['name']=$name;
				//header('location: ../html/profilepage.php');
				echo "<script>setTimeout(\"location.href ='../html/view profile.php';\",100);</script>";
				

			}

			//else
			//{
				//echo "invalid user...";
			//}
		}
	//}
?>
