<?php session_start(); 

require "functions.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<h2>";
    echo updateNewUserPass($_POST['newPass'], $connection);
    echo "</h2>";
}
?>

