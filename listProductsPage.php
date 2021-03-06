<?php

require_once( "checkLogin.php" );
require_once( "checkAdmin.php" );
include_once( "connectToDB.php" );

// ADD
if ( isset( $_POST['add'] ) && $_POST['add'] == "YES" ){
    $hasParameters = isset($_POST["prod_name"]) && isset($_POST["prod_type"]) && isset($_POST["prod_price"]);

    if ( $hasParameters ){
        $prod_name = $_POST["prod_name"];
        $prod_type = $_POST["prod_type"];
        $prod_price = $_POST["prod_price"];

        $addQuery = "INSERT INTO products
                     VALUES ( 0, '$prod_type', '$prod_name', '$prod_price' );";
        mysql_query( $addQuery );
    }

}


// EDIT
if ( isset( $_POST['edit']) && $_POST['edit'] == "YES" ){

    // edit operation
    $hasPOSTParameters = isset( $_POST['prod_id'] ) && isset( $_POST['prod_type'] ) &&
        isset( $_POST['prod_name'] ) && isset( $_POST['prod_price'] );

    if ( $hasPOSTParameters ){
        $prod_id = $_POST['prod_id'];
        $prod_type = $_POST['prod_type'];
        $prod_name = $_POST['prod_name'];
        $prod_price = $_POST['prod_price'];

        $updateQUERY = "UPDATE products
                    SET prod_type='$prod_type',
                        prod_name='$prod_name',
                        prod_price=$prod_price
                    WHERE prod_id=$prod_id;";
        mysql_query( $updateQUERY );
    }
}

// DELETE
if ( isset($_GET['delete']) && $_GET['delete'] == "YES" ){
    $prod_id = $_GET['prod_id'];
    $deleteQuery = "DELETE FROM products WHERE prod_id=$prod_id";
    mysql_query($deleteQuery);
}

?>

<html>

<head>
    <title>Products Page</title>
    <link rel="stylesheet" type="text/css" href="table.css"/>
</head>

<body>

<?php  require_once("logoutPage.php"); ?>

<h3 style="text-align: center">Product Page</h3>

<form action="addProductPage.php" method="GET" style="text-align: center">
    <input type="submit" value="Add"/>
</form>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Price</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>


    <?php

    $listQuery = "SELECT * FROM products;";
    $productsResult = mysql_query($listQuery);
    $numRows = mysql_num_rows($productsResult);

    if ( $numRows ){

        for( $i=0; $i < $numRows; $i++ ){
            $prod_id = mysql_result( $productsResult, $i, "prod_id" );
            $prod_name = mysql_result( $productsResult, $i, "prod_name" );
            $prod_type = mysql_result( $productsResult, $i, "prod_type" );
            $prod_price = mysql_result( $productsResult, $i, "prod_price" );

            echo "<tr>
                    <td style='text-align:center'>$prod_id</td>
                    <td>$prod_name</td>
                    <td>$prod_type</td>
                    <td class='alignRight'>". number_format( $prod_price, 2, '.', ',' ) ."</td>
                    <td style='text-align:center;'>
                        <form action='editProductPage.php' method='GET'>
                            <input type='hidden' name='prod_id' value='$prod_id'/>
                            <input type='submit' value='Edit'/>
                        </form>
                    </td>
                    <td style='text-align:center'>
                        <form action='deleteProductPage.php' method='GET'>
                            <input type='hidden' name='prod_id' value='$prod_id'/>
                            <input type='submit' value='Delete'/>
                        </form>
                    </td>
                  </tr>";
        }

    }else{
        echo "<tr><td colspan='6'>No products added.</td></tr>";
    }

    mysql_close();
    ?>


</table>

</body>

</html>