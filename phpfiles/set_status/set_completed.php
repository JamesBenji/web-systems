<?php
session_start();
// checked

require "../functions/config.php";

$json = file_get_contents('php://input'); //receives the json data send by AJAX

$data = json_decode($json, true);

if ($data === null) {

  // JSON decoding failed

  echo json_encode(['error' => 'Invalid JSON data']);

  exit;
}

$emp_id = $_SESSION['emp_id'];

$delivery_id = $data['delivery_id'];

if (mysqli_query($connection, "UPDATE tms_delivery SET delivery_status = 'completed' WHERE delivery_status = 'ongoing' AND emp_id = '$emp_id'")){

    echo "success updating db";

} else {

    echo "failed update";

}
?>
