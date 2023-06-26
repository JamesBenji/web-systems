<?php
session_start();
require "../../controller/config.php";
$emp_id = $_SESSION['emp_id'];

$up_del_q = "SELECT * FROM (SELECT * FROM tms_delivery INNER JOIN tms_order USING (order_id)) AS derived_table WHERE emp_id = '$emp_id' and delivery_status = 'not completed'";
$up_del_res = $connection->query($up_del_q);

$row_arr = array();

if ($up_del_res) {
    while ($row = $up_del_res->fetch_assoc()) {
        $order_desc = $row["order_desc"];
        $order_qty = $row["order_qty"];
        $delivery_location = $row["delivery_location"];
        $truck_no_plate = $row["truck_no_plate"];
        $delivery_date_end = $row["delivery_date_end"];

        $res_arr = array(
            "order_desc" => $order_desc,
            "order_qty" => $order_qty,
            "delivery_location" => $delivery_location,
            "truck_no_plate" => $truck_no_plate,
            "delivery_date_end" => $delivery_date_end
        );

        $row_arr[] = $res_arr;
    }

    header('Content-Type: application/json');
    echo json_encode($row_arr);
} else {
    http_response_code(500);
    echo json_encode(array("error" => "Failed to fetch data."));
}
?>
