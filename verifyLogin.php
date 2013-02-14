<?php

session_start();

require_once( "connectToDB.php" );

// check for params
if ( $_POST['userName'] && $_POST['password'] ){
    $user_name = $_POST['userName'];
    $pass_word = $_POST['password'];

    // search if user is registered
    $search_query = "SELECT * FROM users WHERE user_name='$user_name' AND password='$pass_word';";
    $search_result = mysql_query( $search_query );
    $num_rows = mysql_num_rows( $search_result );

    if ( $num_rows ){
        // user recognized
        $_SESSION['logged_in'] = true;

        if ( $user_name == 'admin' ){
            // admin page
            $_SESSION['admin'] = true;
            header( "location:mainMenu.php" );
        }
        else
            // regular page
            header( "location:pizzaOrder.php" );

    }else{
        // user not found
        $_SESSION['error'] = true;
        $_SESSION['error_msg'] = "User not found";
        header( "location:loginPage.php" );
    }

}
else{
    // incomplete params
    $_SESSION['error'] = true;
    $_SESSION['error_msg'] = "Please input user name and password.";
    header( "location:loginPage.php" );
}

?>