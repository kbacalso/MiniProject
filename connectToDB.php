<?php

$user = "root";
$password = "";
$database = "restoDB";

mysql_connect( "localhost", $user, $password );
@mysql_select_db( $database ) or die( "Unable to select database" );

?>