<?php
include('logincheck.php');
 
if(isset($_SESSION['username'])){
if($_SESSION["accounts"]=="accounts")
{
    header("location: accountshomepage.html");
}
elseif($_SESSION["accounts"]=="payment")
{
    header("location: paymentmanagementhomepage.html");
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<script type="text/javascript" src="emptyValidation.js"></script>
<body><br><br><br><br><?php echo $error; ?><br><br><br><br><br><br>
    <fieldset align="center" style="width:1480px">
    <legend><b>LOGIN</b></legend>
    <form align="center" onsubmit="return emptyValidation()" method="POST">
    <input type="radio" name="account" value="accounts">Accounts Manager
    <input type="radio" name="account" value="payment">Payment Manager
    <br>
    <label>Username:</label><br><input type="text" id="username" name="username" placeholder="Input user name"><br>
    <label>Password:</label><br><input type="password" id="password" name="password" placeholder="Input Password"><br>
    <input type="submit" name="submit" value="Login"> 
	<a href="../Bankdashboard.php"> Dashboard</a>
    </form>
    </fieldset>
</body>
</html>