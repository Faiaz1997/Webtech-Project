<?php
$message="";
if(isset($_REQUEST['accounts']))
{
	if($_REQUEST["accounts"]=="accounts")
	{
		if(isempty($_REQUEST['username'])||isempty($_REQUEST['password'])){
			$message="Username or password can not be empty...";
		}
	}
	elseif($_REQUEST["accounts"]=="payment management")
	{
		if(isempty($_REQUEST['username'])||isempty($_REQUEST['password'])){
			$message="Username or password can not be empty...";
		}
	}
}
else
{
	$message="Select an option first...";
}
?>