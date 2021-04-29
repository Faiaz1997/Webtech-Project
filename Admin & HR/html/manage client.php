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
    <h1  align="center">Profile</h1>

    <table width="100%" align="center">
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

                </tr>";

 

        while($row = mysqli_fetch_array($result))

        {

        echo "<tr>";

        echo "<td>" . $row['Name'] . "</td>";

        echo "<td>" . $row['Email'] . "</td>";

        echo "<td>" . $row['Phone'] . "</td>";

        echo "<td>" . $row['Address'] . "</td>";

        //echo "<td>" . "<button type='submit'>Update</button>" . "</td>";

        //'delete.php?name="<?php echo $contact['name'];
        echo "<td> <button type='submit'><a href='delete.php?id=" .$row['AccNo']. "'> Delete </a></button> </td>";

        echo "</tr>";

  }

echo "</table>";


 

mysqli_close($con);

?>
        </tr>
        <!--<tr> 
            <td align="center">
                <p>Clint1
                    <button type="submit">Update</button>
                    <button type="submit">Remove</button></p>
                <p>Clint2
                    <button type="submit">Update</button>
                    <button type="submit">Remove</button></p>
                <p>Clint3
                    <button type="submit">Update</button>
                    <button type="submit">Remove</button></p>
                <p>Client4
                    <button type="submit">Update</button>
                    <button type="submit">Remove</button></p>
            </td>
        </tr>-->
    </table>
</body>
</html>

