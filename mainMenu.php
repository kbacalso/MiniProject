<?php

require_once( "checkLogin.php" );
require_once( "checkAdmin.php" );

?>

<html>

<head>
    <title>Admin Page</title>

    <style>
        td, th
        {
            padding: 10px;
            border: solid;
            border-color: green;
            border-width: 1px;
            text-align: center;
            width: 100px;
        }

        table
        {
            border-collapse: collapse;
            width: 50%;
        }
    </style>
</head>

<body>

<?php  require_once( "logoutPage.php" ) ?>

<table align="center">
    <tr>
        <th colspan="3">
            MENU
        </th>
    </tr>
    <tr>
        <td>
            <a href="listProductsPage.php">
                Products Page
            </a>
        </td>
        <td>
            <a href="addProductPage.php">
                Add Product
            </a>
        </td>
        <td>
            <a href="consumerReport.php">
                Report
            </a>
        </td>
    </tr>
</table>

</body>

</html>