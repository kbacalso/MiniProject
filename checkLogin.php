<?php

session_start();

if ( session_id() ){

    if ( !isset($_SESSION['logged_in']) ){
        header( "location:loginPage.php" );
    }


    if ( isset($_POST['logout']) ){
        unset($_SESSION['admin']);
        unset($_SESSION['logged_in']);
        session_unset();
        session_destroy();

        header( "location:loginPage.php" );
    }
}
else{
    $_SESSION['error'] = true;
    $_SESSION['error_msg'] = "Cannot Access this page";
    header("location:loginPage.php");
}


?>
