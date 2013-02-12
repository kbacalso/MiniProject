<?php

function recordProductPurchase( $parameterName, &$products )
{
    $nowDate = date( "Y-m-d" );
    if ( isset($_POST[$parameterName]) ){
        foreach( $_POST[$parameterName] as $value ){
            $query = "INSERT INTO consumer_report
                      VALUES ( 0, '$value', '$nowDate' );
                     ";
            mysql_query( $query );
            $products[] = $value;
        }
    }
}

function computeTotalPurchase($products)
{
    $totalAmt = 0;
    foreach ($products as $prodId) {
        $query = "SELECT prod_price
                  FROM products
                  WHERE prod_id=$prodId";

        $result = mysql_query($query);
        $totalAmt += (int)mysql_result($result, 0, "prod_price");

    }
    return $totalAmt;
}

function checked($category, $value)
{
    return (in_array( $value, $_POST[$category] ))? "checked": "";
}


$totalAmt = 0;
$hasParameters = isset($_POST['pizzaSize']) || isset($_POST['toppings']) || isset($_POST['drinks']);
if ( $hasParameters ){
    include_once( "connectToDB.php" );
    $products =  array();

    // size
    recordProductPurchase( "pizzaSize", $products );
    // toppings
    recordProductPurchase( "toppings", $products );
    // drinks
    recordProductPurchase( "drinks", $products );

    // compute total
    $totalAmt = computeTotalPurchase($products);
    mysql_close();
}

?>

<html>

<head>

	<title>Pizza Order Form</title>
	
	<style type="text/css">
	
        div.category
        {
        border-style:solid;
        border-width:1px;
        border-color: green;
        padding: 10px;
        margin: 10px;
        }

        div.floatLeft
        {
        float: left;
        }

        .clearLine
        {
        clear:both;
        text-align: right;
        padding-right: 22%;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-top: 10px;
        }

        .mainDiv
        {
        margin: 10px;
        padding: 10px;
        width: 50%;
        position: relative;
        left: 25%;
        right: 25%;
        }

	</style>
	
</head>


<form action="pizzaOrder.php" method="POST">

<div class="mainDiv">

	<h4>Pizza Order Form</h4>

    <div class="category floatLeft">

        <b>Pizza Size</b>
        <br/>

        <?php $category="pizzaSize"; ?>
        <input type="checkbox" name="pizzaSize[]" value="1" <?php echo checked($category, "1") ?>/> 10" Php 100.00<br/>
        <input type="checkbox" name="pizzaSize[]" value="2" <?php echo checked($category, "2") ?>/> 14" Php 200.00<br/>
        <input type="checkbox" name="pizzaSize[]" value="3" <?php echo checked($category, "3") ?>/> 18" Php 300.00<br/>

    </div>


    <div class="category floatLeft">

        <b>Toppings</b>
        <br/>

        <?php $category="toppings"; ?>
        <input type="checkbox" name="toppings[]" value="4" <?php echo checked($category, "4") ?>/> Pepperoni Php 60.00<br/>
        <input type="checkbox" name="toppings[]" value="5" <?php echo checked($category, "5") ?>/> Pineapple Php 50.00<br/>
        <input type="checkbox" name="toppings[]" value="6" <?php echo checked($category, "6") ?>/> Bellpepper Php 50.00<br/>

    </div>


    <div class="category floatLeft">

        <b>Drinks</b>
        <br/>

        <?php $category="drinks"; ?>
        <input type="checkbox" name="drinks[]" value="7" <?php echo checked($category, "7") ?>/> Water Php 20.00<br/>
        <input type="checkbox" name="drinks[]" value="8" <?php echo checked($category, "8") ?>/> Coke Php 25.00<br/>
        <input type="checkbox" name="drinks[]" value="9" <?php echo checked($category, "9") ?>/> Iced Tea Php 25.00<br/>

    </div>
	
	
	<div class="clearLine">
	
	    <input type="Submit" value="Purchase Order"/>
	
	</div>

	<div>

	    <b>Total Amount: <?php echo number_format($totalAmt, 2, '.', ','); ?></b>
	
	</div>
	
</div>

</form>

</html