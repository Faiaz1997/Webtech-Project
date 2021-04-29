<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "bms");
    if ($con->connect_error) {
        exit('Could not connect');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Bank Dashboard
        </title>
        <style>
            .c1{
                background-color: #D1EAF7;
                color:#00A1FF;
                padding: 10px 10px 10px 10px;
            }
            .c2{
                background-color: #AEFFEA;
                
                padding: 10px 10px 10px 10px;
            }
        </style>
    </head>
    <body>
            <table align="center" width="100%" >
            </table>
            <table border="1" width="100%" >
                <tr class="c1"><td colspan="2" align="center"><h1>
                    Bank Management System
                </h1></td>
                </tr>
                <tr>
                    <td width="20%" class="c1">
                        <table height="400px">
                            <tr><td><a href="./Admin & HR/html/Admin Login.html">Admin Login</a> </td></tr>
                            <tr><td><a href="./Admin & HR/html/HRLogIn.html">HR Login</a> </td></tr> 
                            <tr><td><a href="./Client/clientlogin.html">Client Login</a> </td></tr>
                            <tr><td><a href="./Card Manager/cardlogin.html">Card Manager Login</a> </td></tr>
                            <tr><td><a href="./Stuff Management/Login.html">Staff Manager Login</a> </td></tr>
                            <tr><td><a href="./Analytics/Login.html">Business Analyst Login</a> </td></tr>
                            <tr><td><a href="./Accounts & Payment Manager/loginforacc.php">Accounts Manager & Payment Manager Login</a> </td></tr>
                        </table>
                    </td>
                    <td width="80%"class="c2">
                        <table align="center" >
                        <tr>
                            <td >
                                <fieldset>
                                    <legend><h1>Notice Board</h1></legend>
                                    <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'bms');
                                    if($conn == null)
                                    {
                                    die('DB connection error!');
                                    }
                                    $sql = "SELECT * FROM notice";
                                    $result = mysqli_query($conn, $sql);
                                    echo "<table border=1 align='center'  width='100%'>
                                        <tr align='center'>
                                            <td width='20%'><b>Subject</b> </td>
                                            <td><b>Details</b>  </td>
                                        </tr>";   
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr align='center'>
                                            <td>{$row['subject']}</td>
                                            <td>{$row['details']}</td>
                                            </tr>";
                                        }
                                    echo "</table>";
                                    ?>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>About Us</h3>
                                <p>
                                    1.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam faucibus fringilla interdum. Nam a congue lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                                    Nulla tincidunt nulla tristique, commodo odio ac, cursus ante. Integer nibh eros, blandit sit amet massa sit amet, viverra consequat metus. Aliquam posuere auctor erat eget luctus. 
                                    Proin elit erat, aliquet non nibh sed, faucibus scelerisque lectus. Quisque id convallis odio. Nulla vestibulum, libero sit amet imperdiet rutrum, mi magna luctus quam, quis posuere lectus justo vel dolor. 
                                    Integer fringilla, neque vitae sagittis mattis, lacus est luctus lectus, in interdum felis sem non enim. <br><br><br>
        
                                    2.Aliquam finibus gravida mi, a vehicula odio ultricies id. Nam mollis fermentum libero, sit amet facilisis felis convallis eget. Nulla facilisi. Ut vitae laoreet dui. Fusce placerat scelerisque est at laoreet. 
                                    Nullam placerat felis sit amet odio sodales semper. Sed in arcu dignissim, mattis arcu vitae, fringilla nunc. Vestibulum turpis turpis, pulvinar ut consequat eget, auctor a orci. Maecenas sit amet imperdiet lacus, 
                                    eu sollicitudin libero. Nunc est mauris, rutrum quis elementum et, laoreet sed eros. Cras semper orci sem, vel imperdiet ligula varius vitae. Sed vitae venenatis ante. Quisque a lacus convallis, ultrices diam in, 
                                    iaculis nibh. Etiam auctor convallis sem, eget placerat elit pretium sit amet. Aliquam id magna ut sapien rhoncus cursus. Vestibulum vitae urna ut elit ornare cursus. <br><br><br>
        
                                    3.Integer in quam viverra, venenatis metus vel, dignissim eros. Sed faucibus turpis neque, nec tristique nibh consectetur at. Morbi quis convallis ante, id ultricies lorem. Duis magna ipsum, tempus eu nunc vel, mollis 
                                    fermentum metus. Nam porta nisi a viverra vehicula. Praesent vestibulum augue eu porta iaculis. Proin a feugiat quam, ac hendrerit ligula. Pellentesque vel velit vitae mi aliquam pulvinar ac a tortor. Quisque ullamcorper 
                                    quam augue, id consectetur odio finibus sed. Sed nec gravida sem. Proin aliquam bibendum quam nec tristique. Nulla nunc arcu, blandit vestibulum elit id, mollis finibus sapien. Integer elementum leo quis nunc feugiat, id 
                                    eleifend neque porta. Donec dignissim felis arcu, vel cursus elit pharetra eu.
                                </p>
                            </td>
                        </tr>
                        </table>

                    </td>
                </tr>
            </table>
    </body>
</html>