<?php
    session_start();    
?>
<!DOCTYPE html>
<html>
<head>
	<title>HR Dashboard</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">HR DASHBOARD</h1>

<p align="center">
    			
                    <?php
                    
                    if(isset($_SESSION['username']))
                    {
                        echo $_SESSION['username'];
                        session_destroy();
                    }
                    ?>
    			 </p>
    <table align="center">

    	 <tr>
            <td align="center">
                <button type="Submit"><a href="performance tracing.html">Performance tracing</button>
            </td>
        </tr>

    	<tr>
    		<td align="center">
    			<button type="Submit"><a href="notice.html">Notice</button>
    		</td>
    	</tr>

        <tr>
            <td align="center">
                <button type="Submit"><a href="Stufdetails.html">STAFF DETAILS</button>
            </td>
        </tr>

         <tr>
            <td align="center">
                <button type="Submit"><a href="Stuff list update.html">Stuff list Update</button>
            </td>
        </tr>


    </table>


</body>
</html>