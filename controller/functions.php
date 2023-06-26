<?php
require "config.php";


function sanitizeValues($value1, $value2){

    $login_data = array(
        "value1" => $value1,
        "value2" => $value2
    );
    $login_data = array_map(function($data){
        return trim($data);
    }, $login_data);

    return $login_data;
}

function authUser($login_data, $connection, $role){
    $table = "tms_".$role;
    $_SESSION['table'] = $table;
    $cred_check = $connection->prepare("SELECT f_name, l_name, acc_password, acc_status from $table where emp_id = ? and acc_password = ?");
    $cred_check -> bind_param("ss", $login_data["value1"], $login_data["value2"]);
    $cred_check-> execute();
    $result = $cred_check -> get_result();
    $data = $result-> fetch_assoc();

    if ($data != NULL) {
        $_SESSION['username'] = $data['f_name']. " ". $data['l_name'];
        $_SESSION['emp_id'] = $login_data["value1"];
        $emp_id = $_SESSION['emp_id'];
        //check acc_status
        if ($data["acc_status"] != 'old'){
            
            header("Location: ../view/page_createPass.php");
            exit();
        } else {
            $_SESSION['login_date'] = date("Y-m-d");
            $login_date = $_SESSION['login_date'];
            $set_login_date_q = "UPDATE $table SET last_login = '$login_date' WHERE emp_id = '$emp_id' ";
            $connection -> query($set_login_date_q);
            $_SESSION['authenticated'] = true;

            //redirect according to role
            if($role == 'driver'){
                header("Location: ../frontend/dashboards/dashboard_driver.php");
                exit();
            } elseif ($role == 'manager'){
                header("Location: ../frontend/dashboards/dashboard_manager.php");
                exit();
            } else {
                header("Location: ../frontend/dashboards/dashboard_admin.php");
                exit();
            }
            
        }
    } else {

        echo "<br> Invalid credentials" ;
        echo "<br> $table" ;
        echo "<br> <a" . " href='../index.php'>" . "Back to login page" . "</a>";
        echo "<br> <a" . " href='forgotPass.php'>" . "Forgot Password?" . "</a>";
    }

}

function updateNewUserPass($newPass, $user_id,$connection){
    $newPass = trim($newPass);
    $table = $_SESSION['table'];
    if(isset($newPass) && mb_strlen($newPass) > 5 && mb_strlen($newPass) < 30){
        $newPass = htmlspecialchars($newPass);
        $update_stmt = $connection -> prepare("UPDATE $table SET  acc_status = 'old', acc_password = ? WHERE emp_id = ? ");
        $update_stmt -> bind_param("ss", $newPass, $user_id);
        $update_stmt -> execute();

        echo "success";

        if ($update_stmt -> affected_rows > 0){
            header("Location: ../frontend/user_login.php");
            return "success";
        } else {
            return "No affected rows";
        }
    }
    else {
        return "Invalid Password length";
    }
    
}

function logoutUser($connection){
    $connection -> close();
    session_unset();
    session_destroy();
    session_write_close();
    header("Location: ../index.php");
    exit();
}

// function generateCode(){
//     return random_int(100000,999999);
// }
?>