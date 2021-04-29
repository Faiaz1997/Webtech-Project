<?php
    session_start();
    include('dbcon.php');
    
    if(isset($_SESSION['name']))
    {
    $n=$_SESSION['name'];
    $sqlUserCheck = "SELECT * FROM client WHERE name = '$n'";
    $result = mysqli_query($con, $sqlUserCheck);
    $rowCount = mysqli_num_rows($result);
       $row = mysqli_fetch_assoc($result);
        $name   = $row['name'];
        $email  = $row['email'];
        $phonenumber = $row['phone'];
        $ads = $row['add'];
        

        // setcookie('status', 'true', time()+5000, '/');
    }
?>
<html>
<head>
    <title>Profile Page</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Profile</h1>

    <table width="100%" align="center">
    	<tr> 
    		<td align="center">
                
    			<p> Name: <?php echo  $name ?> </p>
    			<p> Email: <?php echo  $email ?> </p>
    			<p> Phone Number: <?php echo  $phonenumber ?></p>
    			<p> Address: <?php echo  $ads ?> </p>
                
    		</td>
        </tr>
    </table>
</body>
</html>