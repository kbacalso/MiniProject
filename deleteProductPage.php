<?php

require_once( "checkLogin.php" );
require_once( "checkAdmin.php" );

$prod_id = 0;
if ( isset( $_GET['prod_id'] ) )
    $prod_id = $_GET['prod_id'];

?>

<html>

<head>
    <title>Delete Page</title>
</head>

<body>

<h4>Are you sure you want to delete this product?</h4>

<form action="listProductsPage.php" method="GET">
    <input type="hidden" name="prod_id" value="<?php echo $prod_id ?>">
    <input type="hidden" name="delete" value="YES">
    <input type="submit" value="YES"/>
</form>

<a href="listProductsPage.php">Back</a>

</body>

</html>