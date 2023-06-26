<?php

$SERVERNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DBNAME = 'Hima_TMS_database';

$connection = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

if ($connection) {
    return $connection;
} else {
    return die("Failed connection" . mysqli_connect_error());
}

?>