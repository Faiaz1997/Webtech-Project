<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

    if(isset($_POST['submit']) && isset($_SESSION['name']))
    {
        $name   = $_SESSION['name'];
        $email  = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];
        $add = $_SESSION['ads'];

        
        
        //setcookie('status', 'true', time()+5000, '/');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Profile</h1>

    <table width="100%" align="center">
        <tr> 
            <td align="center">
                <p><a href="profilepage.php">
                  
              </a></p>
            


            </td>
        </tr>
        <tr>
            <?php 
                $sqlvwprof = "SELECT * FROM registration";
                $result = mysqli_query($con, $sqlvwprof); 

                echo "<table border='1'>

                <tr>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Address</th>

                <th>Gender</th>

                <th>Deposit</th>

                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['Name'] . "</td>";

        echo "<td>" . $row['Email'] . "</td>";

        echo "<td>" . $row['Phone'] . "</td>";

        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "<td>" . $row['Deposit'] . "</td>";

        echo "</tr>";

  }

echo "</table>";


 

mysqli_close($con);

?>
        </tr>
    </table>
</body>
</html>




         