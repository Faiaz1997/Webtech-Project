<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

    if(isset($_POST['submit']) && isset($_SESSION['name']))
    {
        $name    =    $_SESSION['name'];
        $rate    =    $_SESSION['rate'];
        $date    =    $_SESSION['date'];
        $add        =    $_SESSION['ads'];

        
        
        //setcookie('status', 'true', time()+5000, '/');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Performance Chart</h1>

    <table width="100%" align="center">
        <tr> 
            <td align="center">
                  
              </a></p>
            


            </td>
        </tr>
        <tr>
            <?php 
                $sqlvwprof = "SELECT * FROM Performance";
                $result = mysqli_query($con, $sqlvwprof); 

                echo "<table border='1'>

                <tr>
                <th>name</th>
                <th>rate</th>
                <th>date</th>
                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['name'] . "</td>";

        echo "<td>" . $row['rate'] . "</td>";

        echo "<td>" . $row['date'] . "</td>";

        //echo "<td>" . $row['add'] . "</td>";

        echo "</tr>";

  }

echo "</table>";


 

mysqli_close($con);

?>
        </tr>
    </table>
</body>
</html>