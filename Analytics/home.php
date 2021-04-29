<?php

	session_start();
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body >
	<table align="center" width="100%">
		<tr height = "100px" align="top">
			<td colspan="3" align="center">
				<h1>List of Services</h1>
			</td>
		</tr>

		<tr align="center">
			<td> 
				<div>
					<input type="text" placeholder="Search Service">
  					<button type="submit"> Search </button>
				</div>
			</td>
		</tr>
		<tr>
			<table align="center" width="100%">
			<tr  align="center">
				<td>
					<h1>Name</h1>
				</td>
				<td>
					<h1>Links</h1>
				</td>
			</tr>
			<tr align="center">
				<td>
					Locker Service
				</td>
				<td>
					<a href="locker.html"> Details</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					Festival/Seasonal Loan
				</td>
				<td>
					<a href="sesonal.html"> Details</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					Term loan for new entrepreneur
				</td>
				<td>
					<a href="entrepreneur.html"> Details</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					Student File Service
				</td>
				<td>
					<a href="student.html"> Details</a>
				</td>
				<td align="center">
					<a href="logout.php">Logout</a>
				</td>
			</tr>
			
		
	</table>

</body>
</html>




