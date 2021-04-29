<?php
	session_start();
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
		if($name == "" || $password == "")
		{
			echo "Null submission";
		}
		else
		{
			$conn = mysqli_connect('localhost', 'root', '', 'bms');
			if($conn == null){
				die('DB connection error!');
			}
			$sql = "SELECT * FROM stuff WHERE Name = '$name' && Pass = '$password' && Position = 'Stuff Manager'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(mysqli_num_rows($result)>0){
				$_SESSION['status'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['pass'] = $row['Pass'];
				$_SESSION['accno'] = $row['AccNo'];
				setcookie('status', 'true', time()+5000, '/');
				setcookie('name', $name, time()+3600, '/');
				setcookie('pass', $password, time()+3600, '/');
				header('location: dashboard.php');
			}
			else
			{
				echo "Invalid User";
			}
			

		}
	}
?>