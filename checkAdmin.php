<?php

if ( session_id() && !isset($_SESSION['admin']) )
    header("location:loginPage.php");

?>