<?php

require_once( "connectToDB.php" );

if ( isset($_POST['userName']) && isset($_POST['password']) ){
    $user_name = $_POST['userName'];
    $pass_word = $_POST['password'];

    $search_query = "SELECT * FROM users WHERE user_name='$user_name' AND password='$pass_word';";
    $search_result = mysql_query( $search_query );
    $num_rows = mysql_num_rows( $search_result );

    if ( $num_rows ){
        session_start();
        $_SESSION['logged_in'] = true;

        if ( $user_name == 'admin' ){
            $_SESSION['admin'] = true;
            header( "location:listProductsPage.php" );
        }
        else
            header( "location:pizzaOrder.php" );

    }else
        header( "location:loginPage.php" );

}
else
    header( "location:loginPage.php" );

?>