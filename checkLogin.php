<?php

session_start();

if ( session_id() ){

    if ( !isset($_SESSION['logged_in']) )
        header( "location:loginPage.php" );

    if ( isset($_POST['logout']) ){
        unset($_SESSION['admin']);
        unset($_SESSION['logged_in']);
        session_unset();
        session_destroy();
        header( "location:loginPage.php" );
    }
}
else
    header("location:loginPage.php");

?>
