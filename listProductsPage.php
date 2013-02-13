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

    include_once("connectToDB.php");

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
                        <input type='button' value='Edit'/>
                    </td>
                    <td>
                        <input type='button' value='Delete'/>
                    </td>
                  </tr>";
        }

    }else{
        echo "<tr><td colspan='6'>No products added.</td></tr>";
    }


    ?>


</table>


</body>

</html>