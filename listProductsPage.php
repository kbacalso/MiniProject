<?php

include_once( "connectToDB.php" );

// ADD
if ( isset( $_POST['add'] ) && $_POST['add'] == "YES" ){
    echo "ADD PRODUCT!";

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

// DELETE

?>

<html>

<head>
    <title>Products Page</title>
</head>

<body>

<h3>Product Page</h3>

<form action="addProductPage.php" method="GET">
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
                    <td>$prod_id</td>
                    <td>$prod_name</td>
                    <td>$prod_type</td>
                    <td>". number_format( $prod_price, 2, '.', ',' ) ."</td>
                    <td>
                        <form action='editProductPage.php' method='GET'>
                            <input type='hidden' name='prod_id' value='$prod_id'/>
                            <input type='submit' value='Edit'/>
                        </form>
                    </td>
                    <td>
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