<?php session_start();

// checked

require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $role = $_POST['role'];
    $_SESSION['role'] = $role;

    if(isset($_POST['CompanyID']) && isset($_POST['password'])){

        $userID = $_POST['CompanyID'];

        $password = $_POST['password'];

        $cleanValues = sanitizeValues($userID, $password);

        $_SESSION["emp_id"] = $cleanValues['value1'];

        authUser($cleanValues, $connection, $_SESSION['role']);
        
    } else {
        echo "Missing Input";
    }
}
?>