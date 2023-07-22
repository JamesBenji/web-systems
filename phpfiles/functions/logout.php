<?php 
    require "functions.php";
    // checked

    $connection -> close();

    session_unset(); //deletes all session variables but does not terminate the session

    session_destroy(); //deletes all session data but does not delete the session variables like session_unset() does

    session_write_close(); //saves all session data before terminating the session

    header("Location: ../../index.php");

    exit();

?>