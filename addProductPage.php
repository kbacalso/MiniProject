<html>

<head>
    <title>Add Product</title>
</head>

<body>

<h3>Add Product Form</h3>

<form method="POST" action="listProductsPage.php">
    <input type="hidden" name="add" value="YES"/>

    <table>
        <tr>
            <td>Product Name: </td>
            <td>
                <input type="text" name="prod_name"/>
            </td>
        </tr>

        <tr>
            <td>Product Type:</td>
            <td>
                <select name="prod_type">
                    <option value=""></option>
                    <option value="pizzaSize">Pizza Size</option>
                    <option value="toppings">Toppings</option>
                    <option value="drinks">Drinks</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                Price:
            </td>
            <td>
                <input type="text" name="prod_price"/>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td style="text-align: right;"><input type="submit" value="Add Product"/></td>
        </tr>
    </table>
</form>

</body>

</html>