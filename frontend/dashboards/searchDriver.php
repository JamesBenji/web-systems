<?php
    session_start();
    require "../../controller/config.php";

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
    // JSON decoding failed
    echo json_encode(['error' => 'Invalid JSON data']);
    exit;
    }

    $f_name = trim($data['f_name']);
    $l_name = trim($data['l_name']);

    $data_q = "SELECT CONCAT(f_name,' ', l_name) as `name`, delivery_location, delivery_status, truck_no_plate, order_desc, work_status from tms_order full join 
    (SELECT * from tms_driver full join tms_delivery using (emp_id)) 
    AS table_1 using (order_id) WHERE f_name = '$f_name' AND l_name = '$l_name'";

    $data = mysqli_query($connection, $data_q)->fetch_assoc();

    $res = array(
        "name" => $data['name'],
        "delivery_location" => $data['delivery_location'],
        "delivery_status" => $data['delivery_status'],
        "truck_no_plate" => $data['truck_no_plate'],
        "order_desc" => $data['order_desc'],
        "work_status" => $data['work_status']
    );

    header('Content-Type: application/json');
    echo json_encode($res);

?>
