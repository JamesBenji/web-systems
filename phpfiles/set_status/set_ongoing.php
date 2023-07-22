<?php 
    session_start();
    // checked

    require "../functions/config.php";

    $emp_id = $_SESSION['emp_id'];

    $set_status_complete_q = "UPDATE tms_delivery SET delivery_status = 'ongoing' WHERE emp_id = '$emp_id' AND delivery_status = 'not completed'";

    mysqli_query($connection, $set_status_complete_q);

    $set_driver_on_trip_q = "UPDATE tms_driver SET work_status = 'on trip' WHERE emp_id = '$emp_id'";
    
    mysqli_query($connection, $set_driver_on_trip_q);
?>