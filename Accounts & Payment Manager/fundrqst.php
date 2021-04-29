<?php
     $accounts="";
	 $err_accounts="";

	 
	 $suffmanagement="";
	 $err_stuffmanagement="";

	 $paymentmanagement="";
	 $err_paymentmanagement="";
	
	 $cardmanagement="";
	 $err_cardmanagement="";

	 $hr="";
	 $err_hr="";
	 
	  $marketingmanagement="";
	 $err_marketingmanagement="";

	 
		 
     if($_SERVER["REQUEST_METHOD"]=="POST")
	 {
		     if(empty($_POST["accounts"])){
				 $err_accounts="[Accounts Required]";
			 }
			 elseif(!is_numeric($_POST["accounts"])){
                 $err_accounts="[Numeric values only]";
             }		
			 else{
				 $accounts=$_POST["accounts"];
			 }
			
			
			
			
			
			
			  if (empty($_POST["stuffmanagement"])) {
                 $err_stuffmanagement = "[stuffmanagement required]";
             }
             	 elseif(!is_numeric($_POST["stuffmanagement"])){
                 $err_stuffmanagement="[Numeric values only]";
             }		 
			 else {
                 $stuffmanagement =$_POST["stuffmanagement"];
             }


			
			  if(empty($_POST["paymentmanagement"])){
                 $err_paymentmanagement="[Paymentmanagement Required]";
             }
             elseif(!is_numeric($_POST["paymentmanagement"])){
                 $err_paymentmanagement="[Numeric values only]";
             }
             
             else{
                 $paymentmanagement=$_POST["paymentmanagement"];
             }





			if(empty($_POST["cardmanagement"])){
                 $err_cardmanagement="[cardmanagement Required]";
             }
			 elseif(!is_numeric($_POST["cardmanagement"])){
                 $err_cardmanagement="[Numeric values only]";
             }
             else{
                 $cardmanagement=$_POST["cardmanagement"];
             }
			


			if(empty($_POST["hr"])){
                 $err_hr="[hr Required]";
             }
			 elseif(!is_numeric($_POST["hr"])){
                 $err_hr="[Numeric values only]";
             }
             else{
                 $hr=$_POST["hr"];
             }


			if(empty($_POST["marketingmanagement"])){
                 $err_marketingmanagement="[Marketing management Required]";
             }
			  elseif(!is_numeric($_POST["marketingmanagement"])){
                 $err_marketingmanagement="[Numeric values only]";
             }
             else{
                 $marketingmanagement=$_POST["marketingmanagement"];
             }
            
			
			
			
			
		 } 
?>



<!DOCTYPE html>
<html>
	<head>
		<title> fund request </title>
	</head>

	<body>
	 <h4> FUND REQUEST  <h4>

<form align="center" method="post"  >
        <table align="center" cellspacing="5">  
            <tr>
                <td><br>Accounts:<br><input name="accounts" type="text"></td>
				<td><?php echo $err_accounts;?> </td>
            </tr>

            <tr>
                <td><br>Stuff Management:<br><input name="stuffmanagement" type="text"></td>
                <td><?php echo $err_stuffmanagement;?></td>
            </tr>
			<tr>
                <td><br>Payment Management:<br><input name="paymentmanagement" type="text"></td>
                <td><?php echo $err_paymentmanagement;?></td>
            </tr>
			<tr>
                <td><br>Card Department:<br><input name="cardmanagement" type="text"></td>
                <td><?php echo $err_cardmanagement;?></td>
            </tr>
			<tr>
                <td><br>HR:<br><input name="hr" type="text"></td>
                <td><?php echo $err_hr;?></td>
            </tr>
			<tr>
                <td><br>Marketing Management:<br><input name="marketingmanagement" type="text"></td>
                <td><?php echo $err_marketingmanagement;?></td>
            </tr>
            
			
            <tr><td>
                <br><input type="submit" name="submit" > 
            </tr>
        </table>
    </form>
	</body>
</html>






















