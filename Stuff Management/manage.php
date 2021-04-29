<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

?>

<html>
<head>
    <title>Bank Mnagement System</title>
</head>
<body style="background: lightblue ">
    <h1  align="center">Profile</h1>

    <table width="100%" align="center">
        <tr>
            <?php 
                $sqlvwprof = "SELECT * FROM employee";
                $result = mysqli_query($con, $sqlvwprof); 

                echo "<table border='1', align='center'>

                <tr>

                <th>Employee ID </th>

                <th>Name</th>

                <th>Email</th>

                <th>Address</th>

                <th>Phone</th>

                <th>Salary</th>

                <th>Position</th>

                <th>Gender</th>

                <th>Date of Birth</th>

                <th>Remove</th>


                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['empno'] . "</td>";

        echo "<td>" . $row['Name'] . "</td>";

        echo "<td>" . $row['Email'] . "</td>";

        echo "<td>" . $row['Address'] . "</td>";

        echo "<td>" . $row['Phone'] . "</td>";

        echo "<td>" . $row['Salary'] . "</td>";

        echo "<td>" . $row['Position'] . "</td>";

        echo "<td>" . $row['Gender'] . "</td>";

        echo "<td>" . $row['DOB'] . "</td>";

        //echo "<td>" . "<button type='submit'>Update</button>" . "</td>";

        //'delete.php?name="<?php echo $contact['name'];
        echo "<td> <button type='submit'><a href='delete.php?empno=" .$row['empno']. "'> Delete </a></button> </td>";

        echo "</tr>";

    }

    echo "</table>";


 

    mysqli_close($con);

    ?>
        </tr>
    </table>
</body>
</html>

