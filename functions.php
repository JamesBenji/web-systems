<?php
require "config.php";


function sanitizeValues($username, $password){

    $login_data = array(
        "username" => $username,
        "password" => $password
    );
    $login_data = array_map(function($data){
        return trim($data);
    }, $login_data);

    return $login_data;
}

function authUser($login_data, $connection){
    $cred_check = $connection->prepare("SELECT f_name, acc_password, acc_status from `Hima_TMS_database`.`tms_driver` where f_name = ? and acc_password = ?");
    $cred_check -> bind_param("ss", $login_data["username"], $login_data["password"]);
    $cred_check-> execute();
    $result = $cred_check -> get_result();
    $data = $result-> fetch_assoc();

    if ($data != NULL) {

        //check acc_status
        if ($data["acc_status"] != 'old'){
            header("Location: page_createPass.php");
            exit();
        } else {
            $_SESSION['authenticated'] = true;
            header("Location: page_dashboard.php");
            exit();
        }
    } else {
        echo "<br> failed, data is null" ;
    }

}

function updateNewUserPass($newPass, $connection){
    $newPass = trim($newPass);
    if(isset($newPass) && mb_strlen($newPass) > 5 && mb_strlen($newPass) < 12){
        $newPass = htmlspecialchars($newPass);
        $user = $_SESSION['username'];
        $update_stmt = $connection -> prepare("UPDATE tms_driver SET  acc_status = 'old', acc_password = ? WHERE f_name = ? ");
        $update_stmt -> bind_param("ss", $newPass, $user);
        $update_stmt -> execute();
        header("Location: page_dashboard.php");

        return "success";
    }
    else {
        return "Invalid Password length";
    }
    
}

?>