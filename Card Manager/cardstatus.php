<!DOCTYPE html>
<html>
    <head>
        <title>
            Card Status Page
        </title>
        <style>
            .c1{
                background-color: blanchedalmond;
                padding: 10px 10px 10px 10px;
            }
        </style>
    </head>
    <body>
        <table align="center" width="100%" height="80px" class="c1">
            <tr>
                <td align="left" width="25%"><a href="carddepertmenthome.html"><b>Home</b> </a> </td>
                <td align="left" width="25%"><a href="cardapp.html"><b>Application</b> </a> </td>
                <td align="left" width="25%"><a href="cardmsg.php"><b>Messages</b> </a> </td>
                <td align="right" width="25%"><h1><b>Card Depertment </b></h1></td>       
            </tr>
        </table>
        <table border="1" width="100%" >
            <tr>
                <td width="20%" class="c1">
                <table height="400px">
                            <tr><td><a href="cardreq.php">Card Requests</a> </td></tr>
                            <tr><td><a href="cardupdate.html">Card Data Update</a> </td></tr>
                            <tr><td><a href="cardstatus.php">Card Status</a></td></tr>
                            <tr><td><a href="carddelete.html">Card Delete</a></td></tr>
                            <tr><td><a href="cardlogout.php">Log Out</a></td></tr>    
                        </table>
                <td width="80%">
                    <table align="center" width="60%">
                        <tr>
                            <td>
                                <fieldset>
                                    <legend>Status</legend>
                                        <table align="center">
                                            <tr>
                                                <td>
                                                    <?php
                                                        session_start();
                                                        
                                                        $conn = mysqli_connect('localhost', 'root', '', 'bms');
                                                        if($conn == null){
                                                            die('DB connection error!');
                                                        }
                                                        $sql = "SELECT * FROM card where status = 'Active' || status = 'Inactive'";
                                                        $result = mysqli_query($conn, $sql);
                                                        echo "<table border=1 align='center'  width='100%'>
                                                            <tr align='center'>
                                                                <td>Name</td>
                                                                <td>Account No</td>
                                                                <td>Card Type</td>
                                                                <td>Status</td>
                                                               
                                                            </tr>";   
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {
                                                                echo "<tr align='center'>
                                                                <td>{$row['name']}</td>
                                                                <td>{$row['AccNo']}</td>
                                                                <td>{$row['cardtype']}</td>
                                                                <td>{$row['status']}</td>
                                                                </tr>";
                                                            }
                                                        echo "</table>";
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>