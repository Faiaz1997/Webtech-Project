<?php
	session_start();
	include('dbcon.php');
	
	//if(isset($_POST['username'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		
		//if($username == "" || $password == "")
		//{
		//	echo "Null submission";
		//}

		//else
		//{
			$sqlUserCheck = "SELECT uname,upass,ucat FROM hrlogin WHERE uname = '$username'";
    		$result = mysqli_query($con, $sqlUserCheck);
    		$rowCount = mysqli_num_rows($result);
	   		$row = mysqli_fetch_assoc($result);

	   	if($rowCount<1)
      	 {
       	  echo "NO USER EXIST!";
      	 }
      	 else
      	 {

      	 		if($username ==$row['uname'] && $password == $row['upass'])
			{

				
				
			 if($row['ucat']=='hr')

				{
				$_SESSION['username'] = $username;
				//header('location: ../html/HRDashboard.php');	
				echo "<script>setTimeout(\"location.href ='../html/HRDashboard.php';\",100);</script>";
				}
				
				else
			{
				echo "invalid user...";
			}

				
			}
			
			
      	 }

			//$user = $_SESSION['abc'];

		
			
		//}
	//}
	//else {echo "invalid"; }
?>