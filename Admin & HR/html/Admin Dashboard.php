<?php
	session_start();	
?>

<html>
<head>
    <title>Home Page</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Admin</h1>

    <table width="100%" align="center">
    	<tr> 
    		<td align="center">
    			<img src="images.png">
    			<p>Username:
    				<?php
    				
    				if(isset($_SESSION['username']))
    				{
    					echo $_SESSION['username'];
    					session_destroy();
    				}
    				
    				?>
    			 </p>
    			<p> Name: Mr. SDE </p>
    			<p> Email:sde@company.com </p>
    			<p> ID: 111 </p>
    			<p> Designation: Admin</p>
    			<br>
    			<p><a href="Admin Login.html">Logout</p>
    		</td>

    		<td align="center">
    			<h2>Information</h2>
    			<button type="button" ><a href="clientreg.html">Add Client</a></button><br><br>
    			<button type="button"><a href="view Profile.php">View Client Profile</a></button><br><br>
    			<button type="button"><a href="manage client.php">Manage Client</a></button><br><br>
                <button type="button" ><a href="add stuff.html">Add Stuff</a></button><br><br>
                <button type="button"><a href="managestuff.php">Manage Stuff</a></button><br><br>
    	</tr>
    </table>
</body>
</html>
