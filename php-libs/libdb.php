<?php

require_once( "php-libs/libinfo.php" );

function db_connect()
{
    return mysql_connect( "localhost", info_user(), info_pass() );
}

function db_close( $link )
{
    mysql_close( $link );
}
?>
