<?php 

session_start();
require "../../controller/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $arr = array(
        "f_name" => $_POST['f_name'],
        "l_name" => $_POST['l_name'],
        "sex" => $_POST['sex'],
        "tel_no" => $_POST['tel_no'],
        "email" => $_POST['email'],
        "residence" => $_POST['residence'],
        "dob" => $_POST['dob'],
        "img" => $_POST['img'],
        "permit_no" => $_POST['permit_no']
    );

    $arr = array_map(function($value){
        $value = trim($value);
        $value = htmlspecialchars($value);
        return $value;
    }, $arr);
    
    $insert_q = "INSERT INTO tms_driver(f_name, l_name, sex, tel_no, email, residence, date_of_birth, emp_img, permit_no) 
    VALUES ('{$arr['f_name']}', '{$arr['l_name']}', '{$arr['sex']}', '{$arr['tel_no']}', '{$arr['email']}', '{$arr['residence']}', '{$arr['dob']}', '{$arr['img']}', '{$arr['permit_no']}')";

    $status = mysqli_query($connection, $insert_q);

    echo $status;
    header("Location: ../dashboard/dashboard_admin.php");

    
}

?>