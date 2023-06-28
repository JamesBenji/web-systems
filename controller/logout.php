<?php require "functions.php";
    $connection -> close();
    session_unset();
    session_destroy();
    session_write_close();
    header("Location: ../index.php");
    exit();

?>