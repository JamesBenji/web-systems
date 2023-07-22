<?php require "functions.php";
// checked

    $web_admin_contact = $connection -> prepare("SELECT tel_no, email FROM tms_web_app_admin");

    $web_admin_contact -> execute();

    $res = $web_admin_contact -> get_result();

    $row_web = $res -> fetch_assoc();

    $tel_no = $row_web['tel_no'];

    $email = $row_web['email'];
    
    echo "<br> Contact the Web admin to create an account<br> Contact:<br> $tel_no <br>$email";

?>