<?php

echo var_dump( $_POST );

$hasParameters = isset($_POST["prod_name"]) && isset($_POST["prod_type"]) && isset($_POST["prod_price"]);

if ( $hasParameters ){

    include_once( "connectToDB.php" );

    $prod_name = $_POST["prod_name"];
    $prod_type = $_POST["prod_type"];
    $prod_price = $_POST["prod_price"];

    $addQuery = "INSERT INTO products
                 VALUES ( 0, '$prod_type', '$prod_name', '$prod_price' );";
    mysql_query( $addQuery );
    mysql_close();
}

?>

<html>

<head>
    <title>Add Product</title>
</head>

<body>

<h3>Add Product Form</h3>

<form method="POST" action="addProductPage.php">
    Product Name: <input type="text" name="prod_name"/> <br/>
    Product Type:
        <select name="prod_type">
            <option value=""></option>
            <option value="pizzaSize">Pizza Size</option>
            <option value="toppings">Toppings</option>
            <option value="drinks">Drinks</option>
        </select>
        <br/>
    Price: <input type="text" name="prod_price"/>
    <br/>

    <input type="submit" value="Add Product"/>
</form>

</body>

</html>