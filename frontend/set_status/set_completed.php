<?php 
    session_start();


    require "../../controller/functions.php";
   
    $emp_id = $_SESSION['emp_id'];
    $del_id = $_GET['del_id'];

    $update_q = mysqli_query($connection, "UPDATE tms_delivery SET delivery_status = 'completed' WHERE emp_id = '$emp_id' AND delivery_id = '$del_id'");
?>