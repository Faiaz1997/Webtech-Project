<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

?>

<html>
<head>
    <title>Home Page</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Notice</h1>

    <table width="100%" align="center">
        <tr>
            <?php 
                $sqlnt = "SELECT * FROM notice";
                $result = mysqli_query($con, $sqlnt); 

                echo "<table border='1' , align='center'>

                <tr>

                <th>Subject</th>

                <th>Details</th>

                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['subject'] . "</td>";

        echo "<td>" . $row['details'] . "</td>";

        echo "</tr>";

  }

echo "</table>";


 

mysqli_close($con);

?>
        </tr>
       
    </table>
</body>
</html>

