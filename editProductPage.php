<?php

function isSelected( $prod_type, $option_val )
{
    return ( $prod_type == $option_val )? "selected": "";
}

include_once( "connectToDB.php" );

// placeholders
if ( isset( $_GET['prod_id'] ) ){
    $search_id = $_GET['prod_id'];
    $getProdQuery = "SELECT * FROM products WHERE prod_id=$search_id;";

    $prodResult = mysql_query( $getProdQuery );
    $prodRows = mysql_num_rows( $prodResult );

    if ( $prodRows ){
        $prod_id = mysql_result( $prodResult, 0, "prod_id" );
        $prod_type = mysql_result( $prodResult, 0, "prod_type" );
        $prod_name = mysql_result( $prodResult, 0, "prod_name" );
        $prod_price = mysql_result( $prodResult, 0, "prod_price" );
    }
}

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

mysql_close();
?>

<html>

<head>
    <title>Edit Product</title>
</head>

<body>

<h3>Edit Product Form</h3>

<form method="POST" action="editProductPage.php">
    <input type="hidden" name="prod_id" value="<?php echo $prod_id ?>"/>
    Product Name: <input type="text" name="prod_name" value='<?php echo $prod_name; ?>'/> <br/>
    Product Type:
    <select name="prod_type">
        <option value=""></option>
        <option value="pizzaSize" <?php echo isSelected( $prod_type, "pizzaSize" ) ?>>Pizza Size</option>
        <option value="toppings" <?php echo isSelected( $prod_type, "toppings" ) ?>>Toppings</option>
        <option value="drinks" <?php echo isSelected( $prod_type, "drinks" ) ?>>Drinks</option>
    </select>
    <br/>
    Price: <input type="text" name="prod_price" value="<?php echo number_format( $prod_price, 2, '.', ',' ); ?>"/>
    <br/>

    <input type="submit" value="Edit Product"/>
</form>

</body>

</html>