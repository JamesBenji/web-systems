<?php
    session_start();
    require "./config.php";
    // checked

    // get available drivers
    $available_d_q = "SELECT COUNT(emp_id) AS available_drivers FROM tms_driver WHERE work_status = 'available'";
    $available_d = mysqli_query($connection, $available_d_q)->fetch_assoc()['available_drivers'];

    // get total qty delivered
    $total_qty_q = "SELECT SUM(order_qty) AS total_qty FROM tms_order INNER JOIN tms_delivery USING (order_id)";
    $total_qty = mysqli_query($connection, $total_qty_q)->fetch_assoc()['total_qty'];
    
    // get remaining del
    $remaining_del_q = "SELECT COUNT(delivery_id) AS remaining_del FROM tms_delivery WHERE delivery_status = 'not completed'";
    $remaining_del = mysqli_query($connection, $remaining_del_q)->fetch_assoc()['remaining_del'];


    // get done del
    $done_del_q = "SELECT COUNT(delivery_id) AS done_del FROM tms_delivery WHERE delivery_status = 'completed'";
    $done_del = mysqli_query($connection, $done_del_q)->fetch_assoc()['done_del'];

    // get ongoing del
    $ongoing_del_q = "SELECT COUNT(delivery_id) AS ongoing_del FROM tms_delivery WHERE delivery_status = 'ongoing'";
    $ongoing_del = mysqli_query($connection, $ongoing_del_q)->fetch_assoc()['ongoing_del'];

    $stats = array(
        "available_d" => $available_d,
        "total_qty"=> $total_qty,
        "remaining_del"=> $remaining_del,
        "done_del"=> $done_del,
        "ongoing_del"=> $ongoing_del
    );



    header('Content-Type: application/json');
    echo json_encode($stats);

?>
