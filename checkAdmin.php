<?php

if ( session_id() == '' )
    session_start();

if ( !isset($_SESSION['admin']) )
    header("location:loginPage.php");

?>