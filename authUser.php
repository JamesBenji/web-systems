<?php session_start(); ?>

<?php
require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // isset($_POST['username']) ? $username = htmlspecialchars($_POST["username"]) : exit("username unset");
    // isset($_POST['password']) ? $password = htmlspecialchars($_POST["password"]): exit("pass unset");
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cleanValues = sanitizeValues($username, $password);
        $_SESSION['username'] = $cleanValues['username'];
        authUser($cleanValues, $connection);
    } else {
        echo "Missing Input";
    }



}

?>