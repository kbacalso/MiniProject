<html>

<head>
    <title>Add Product</title>
</head>

<body>

<h3>Add Product Form</h3>

<form method="POST" action="listProductsPage.php">
    <input type="hidden" name="add" value="YES"/>
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