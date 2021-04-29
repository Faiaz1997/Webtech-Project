<?php
include('db.php');
session_start(); 

 $error="";
// store session data
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password']) || isset($_REQUEST['accounts'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$designation=$_REQUEST['account'];

$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"stuff",$username,$password,$designation);

if ($userQuery->num_rows > 0) {
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$_SESSION["accounts"] = $designation;

   }
 else {
$error = "Username or Password is invalid";
}
$connection->CloseCon($conobj);

}
}
?>
