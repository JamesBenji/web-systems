<?php
    session_start();
    require "../../controller/config.php";
    $emp_id = $_SESSION['emp_id'];
    $big_table_q = "SELECT emp_id FROM tms_driver INNER JOIN tms_delivery USING (emp_id)";
    $emp_id_rows = $connection->query($big_table_q);

    // getting all emp_ids in inner join
    $emp_id_arr = [];
    $emp_data_arr = [];
    while($row = $emp_id_rows->fetch_assoc()){
        $emp_id_arr[] = $row['emp_id'];
    }

    foreach($emp_id_arr as $emp_id){
        $emp_q = "SELECT f_name, l_name, tel_no, email, delivery_status FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE emp_id = '$emp_id'";
        $emp_q_rows = $connection->query($emp_q);
        $emp_data = $emp_q_rows->fetch_assoc();

        $emp_f_name = $emp_data['f_name'];
        $emp_l_name = $emp_data['l_name'];
        $emp_tel_no = $emp_data['tel_no'];
        $emp_email = $emp_data['email'];
        
        // select count complete, non, all and ongoing
        $count_complete_q = "SELECT COUNT(emp_id) AS completed_tasks FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id'";
        $count_complete_res = mysqli_query($connection, $count_complete_q); //1 row

        $count_incomplete_q = "SELECT COUNT(emp_id) AS incomplete_tasks FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'not completed' AND emp_id = '$emp_id'";
        $count_incomplete_res = mysqli_query($connection, $count_incomplete_q); //1 row

        $count_ongoing_q = "SELECT COUNT(emp_id) AS ongoing_tasks FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'ongoing' AND emp_id = '$emp_id'";
        $count_ongoing_res = mysqli_query($connection, $count_ongoing_q); //1 row


        //store variable data from emp_id_rows
        $count_complete = $count_complete_res->fetch_assoc()['completed_tasks'];
        $count_incomplete = $count_incomplete_res->fetch_assoc()['incomplete_tasks'];
        $count_ongoing = $count_ongoing_res->fetch_assoc()['ongoing_tasks'];


        // store result rows in an assoc array

        $emp_data_arr[] = array(
            "emp_id" => $emp_id,
            "emp_f_name" => $emp_f_name,
            "emp_l_name" => $emp_l_name,
            "emp_tel_no" => $emp_tel_no,
            "emp_email" => $emp_email,
            "count_complete" => $count_complete,
            "count_incomplete" => $count_incomplete,
            "count_ongoing" => $count_ongoing
        );
    }

    header('Content-Type: application/json');
    echo json_encode($emp_data_arr);

?>
