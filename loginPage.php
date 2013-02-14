<?php

session_start();

if ( isset( $_SESSION['error'] ) ){
    echo "<h4 align='center'>".$_SESSION['error_msg']."</h4>";
    unset( $_SESSION['error'] );
    unset( $_SESSION['error_msg'] );
}

?>

<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="table.css"/>
</head>

<body>


<form method="POST" action="verifyLogin.php">

    <table>

        <tr>
            <th colspan="2">
                Login
            </th>
        </tr>

        <tr>
            <td>User Name:</td>
            <td>
                <input type="text" name="userName"/>
            </td>
        </tr>

        <tr>
            <td>Password:   </td>
            <td>
                <input type="password" name="password"/>
            </td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: right">
                <input type="submit" value="Login"/>
            </td>
        </tr>

    </table>


</form>


</body>

</html>