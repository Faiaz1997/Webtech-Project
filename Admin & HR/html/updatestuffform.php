<?php

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) 
    {
        exit('Could not connect');
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Stuff</title>
</head>
<body>
	
	<table width="100%" align="center">
        <tr>
            <?php 

            	$empno = $_GET['empno'];

                $sqlstuff = "SELECT * FROM stuff WHERE empno = $empno";
                $result = mysqli_query($con, $sqlstuff); 

                echo "<table border='1', align='center'>

                <tr>

                <th>Employee ID </th>

                <th>Name</th>

                <th>Email</th>

                <th>Address</th>

                <th>Phone</th>

                <th>Salary</th>

                <th>Position</th>

                <th>Gender</th>

                <th>Date of Birth</th>


                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['empno'] . "</td>";

        echo "<td>" . $row['Name'] . "</td>";

        echo "<td>" . $row['Email'] . "</td>";

        echo "<td>" . $row['Address'] . "</td>";

        echo "<td>" . $row['Phone'] . "</td>";

        echo "<td>" . $row['Salary'] . "</td>";

        echo "<td>" . $row['Position'] . "</td>";

        echo "<td>" . $row['Gender'] . "</td>";

        echo "<td>" . $row['DOB'] . "</td>";

        echo "</tr>";

    }

    echo "</table>";
    ?>



	<table align="center">
		<tr>
			<td>
				<form method="POST" action="updatestuff.php" onsubmit="return Validation()" >
					<fieldset>
						<legend align="center">Update Stuff</legend>
						<table>
							<tr>
								<td>Name:</td>
								<td><input type="text" name="name"  id="name"></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><input type="text" name="email"  id="email"></td>
							</tr>
							<tr>
								<td>Address:</td>
								<td><input type="text" name="address"  id="address"></td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td><input type="text" name="phone" id="phone"></td>
							</tr>
							<tr>
								<td>Salary:</td>
								<td><input type="text" name="salary" id="salary"></td>
							</tr>
							<tr>
								<td>Position:</td>
								<td>
								<select name="position" id="position">
										<option>Select an option</option>
										<option value="Accounts Manager">Accounts Manager</option>
										<option value="HR">HR</option>
										<option value="Marketing Manager">Marketing Manager</option>
										<option value="Cashier">Cashier</option>
										<option value="Card Manager">Card Manager</option>
										<option value="Business Analyist">Business Analyist</option>
								</td>
							</tr>
							
							
							<tr> 
								<td>Date of Birth:</td>
								<td>
									<input type="date" name="dob"  id="dob">
								</td>
									
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password" id="password"></td>
							</tr>
							<tr>
								<td colspan="2" align="right">
									<input type="submit" name="submit" value="Submit">
									<input type="reset" name="reset" value="Reset">
								</td>
							</tr>
						</table>
						
					</fieldset>
			
				</form>

			</td>
		</tr>
	</table> 
	<script>
		function Validation()
		{
			const name = document.getElementById('name').value;
			const email = document.getElementById('email').value;
			const address = document.getElementById('address').value;
			const phone = document.getElementById('phone').value;
			const password = document.getElementById('password').value;
			const salary = document.getElementById('salary').value;
			const dob= document.getElementById('dob').value;
			const position = document.getElementById('position').value;

			let errorflag =false;
			let i=0;

			if(name == '' || email == '' || address == '' || phone == '' || salary  == '' || password == '' || dob == '' || position == '')
			{
				alert('Null Submission');
				errorflag=true;
			}
			else
			{
				let mailflag=false;
		
				for(i=0;i<email.length;i++)
				{
					if((email[i] == '@' ))
					{
						mailflag=true;
					}
				}
				if(mailflag == false)
				{
					alert('Invalid email Format');
					errorflag=true;
				}

				let phoneflag=false;
		
				for(i=0;i<phone.length;i++)
				{
					if((phone[i] >= 0 ) && (phone[i] <= 9 ))
					{
							phoneflag=true;				         
					}
				}
				if(phoneflag == false)
				{
					alert('Invalid phone number Format');
					errorflag=true;
				}

				if((phone.length <7) || (phone.length >11))
					{
						alert ('Invalid Phone Number');
						errorflag=true;
					}

				let salaryflag=false;
		
				for(i=0;i<salary.length;i++)
				{
					if((salary[i] >= 0 ) && (salary[i] <= 9 ))
					{
							salaryflag=true;				         
					}
				}
				if(salaryflag == false)
				{
					alert('Invalid phone number Format');
					errorflag=true;
				}

				if((salary.length <1) || (salary.length >5))
					{
						alert ('Invalid Salary Digit');
						errorflag=true;
					}


				let passflag=false;

				for(i=0;i<password.length;i++)
				{
					if((password[i] == '@' || 
					password[i] == '$' ||
					password[i] == '#' ||
					password[i] == '%')) 
					{
						passflag=true;
					}
				}
		
				if(passflag == false)
				{
					alert ('Password must contain atleast one of the special characters (@, $, % or #!)');
					errorflag=true;
				}
				if(password.length < 4)
				{
					alert ('Password must contain atleast 4 characters');
					errorflag=true;
				}
		
			}
			if(errorflag==false)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}
	</script>
</body>
</html>