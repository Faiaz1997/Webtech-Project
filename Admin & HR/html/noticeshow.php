<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

    if(isset($_POST['submit']) && isset($_SESSION['name']))
    {
        $noticeid   =    $_SESSION['noticeid'];
        $subject    =    $_SESSION['subject'];
        $details    =    $_SESSION['details'];
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
    <h1  align="center">Notice Chart</h1>

    <table width="100%" align="center">
        <tr> 
            <td align="center">
                <p><a href="profilepage.php">
                  
              </a></p>
            


            </td>
        </tr>
        <tr>
            <?php 
                $sqlvwprof = "SELECT * FROM notice";
                $result = mysqli_query($con, $sqlvwprof); 

                echo "<table border='1'>

                <tr>

                <th>noticeid</th>

                <th>subject</th>

                <th>details</th>

                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['noticeid'] . "</td>";

        echo "<td>" . $row['subject'] . "</td>";

        echo "<td>" . $row['details'] . "</td>";

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