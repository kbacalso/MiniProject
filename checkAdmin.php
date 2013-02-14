<?php

if ( session_id() && !isset($_SESSION['admin']) ){
    $_SESSION['error'] = true;
    $_SESSION['error_msg'] = "Cannot Access this page";
    header("location:loginPage.php");
}

?>