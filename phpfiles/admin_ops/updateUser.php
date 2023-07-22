<?php 

session_start();
// checked

require "../functions/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $arr = array(

        "emp_id" => $_POST['id'],

        "f_name" => $_POST['f_name'],

        "l_name" => $_POST['l_name'],

        "sex" => $_POST['sex'],

        "tel_no" => $_POST['tel_no'],

        "email" => $_POST['email'],

        "residence" => $_POST['residence'],

        "dob" => $_POST['dob'],

        "img" => $_POST['img'],

        "role" => $_POST['role']

    );

    $arr = array_map(function($value){

        $value = trim($value);

        $value = htmlspecialchars($value);

        return $value;

    }, $arr);

    $table = "tms_".$arr['role'];
    
    $insert_q = "UPDATE $table SET f_name = '{$arr['f_name']}', l_name = '{$arr['l_name']}', sex = '{$arr['sex']}', tel_no = '{$arr['tel_no']}', email = '{$arr['email']}', residence = '{$arr['residence']}', date_of_birth = '{$arr['dob']}' WHERE emp_id = '{$arr['emp_id']}'";

    $status = mysqli_query($connection, $insert_q);

    echo $status;

    header("Location: ../../dashboards/dashboard_admin.php");

}
?>