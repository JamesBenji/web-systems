<?php
    session_start();
    require "./config.php";
    // checked

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

        $count_jan = "SELECT COUNT(emp_id) AS jan FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-01-__'";
        $count_jan_res = mysqli_query($connection, $count_jan); //1 row
        
        $count_feb = "SELECT COUNT(emp_id) AS feb FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-02-__'";
        $count_feb_res = mysqli_query($connection, $count_feb); //1 row
        
        $count_mar = "SELECT COUNT(emp_id) AS mar FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-03-__'";
        $count_mar_res = mysqli_query($connection, $count_mar); //1 row
        
        $count_apr = "SELECT COUNT(emp_id) AS apr FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-04-__'";
        $count_apr_res = mysqli_query($connection, $count_apr); //1 row
        
        $count_may = "SELECT COUNT(emp_id) AS may FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-05-__'";
        $count_may_res = mysqli_query($connection, $count_may); //1 row
        
        $count_jun = "SELECT COUNT(emp_id) AS jun FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-06-__'";
        $count_jun_res = mysqli_query($connection, $count_jun); //1 row
        
        $count_jul = "SELECT COUNT(emp_id) AS jul FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-07-__'";
        $count_jul_res = mysqli_query($connection, $count_jul); //1 row
        
        $count_aug = "SELECT COUNT(emp_id) AS aug FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-08-__'";
        $count_aug_res = mysqli_query($connection, $count_aug); //1 row
        
        $count_sep = "SELECT COUNT(emp_id) AS sep FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-09-__'";
        $count_sep_res = mysqli_query($connection, $count_sep); //1 row
        
        $count_oct = "SELECT COUNT(emp_id) AS oct FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-10-__'";
        $count_oct_res = mysqli_query($connection, $count_oct); //1 row
        
        $count_nov = "SELECT COUNT(emp_id) AS nov FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-11-__'";
        $count_nov_res = mysqli_query($connection, $count_nov); //1 row
        
        $count_dec = "SELECT COUNT(emp_id) AS `dec` FROM tms_driver INNER JOIN tms_delivery USING (emp_id) WHERE delivery_status = 'completed' AND emp_id = '$emp_id' AND delivery_date_end LIKE '____-12-__'";
        $count_dec_res = mysqli_query($connection, $count_dec); //1 row


        //store variable data from emp_id_rows
        $count_complete = $count_complete_res->fetch_assoc()['completed_tasks'];
        $count_incomplete = $count_incomplete_res->fetch_assoc()['incomplete_tasks'];
        $count_ongoing = $count_ongoing_res->fetch_assoc()['ongoing_tasks'];
        $count_jan = $count_jan_res->fetch_assoc()['jan'];
        $count_feb = $count_feb_res->fetch_assoc()['feb'];
        $count_mar = $count_mar_res->fetch_assoc()['mar'];
        $count_apr = $count_apr_res->fetch_assoc()['apr'];
        $count_may = $count_may_res->fetch_assoc()['may'];
        $count_jun = $count_jun_res->fetch_assoc()['jun'];
        $count_jul = $count_jul_res->fetch_assoc()['jul'];
        $count_aug = $count_aug_res->fetch_assoc()['aug'];
        $count_sep = $count_sep_res->fetch_assoc()['sep'];
        $count_oct = $count_oct_res->fetch_assoc()['oct'];
        $count_nov = $count_nov_res->fetch_assoc()['nov'];
        $count_dec = $count_dec_res->fetch_assoc()['dec'];


        // store result rows in an assoc array

        $emp_data_arr[] = array(
            "emp_id" => $emp_id,
            "emp_f_name" => $emp_f_name,
            "emp_l_name" => $emp_l_name,
            "emp_tel_no" => $emp_tel_no,
            "emp_email" => $emp_email,
            "count_complete" => $count_complete,
            "count_incomplete" => $count_incomplete,
            "count_jan" => $count_jan,
            "count_feb" => $count_feb,
            "count_mar" => $count_mar,
            "count_apr" => $count_apr,
            "count_may" => $count_may,
            "count_jun" => $count_jun,
            "count_jul" => $count_jul,
            "count_aug" => $count_aug,
            "count_sep" => $count_sep,
            "count_oct" => $count_oct,
            "count_nov" => $count_nov,
            "count_dec" => $count_dec
        );
    }

    header('Content-Type: application/json');
    echo json_encode($emp_data_arr);

?>
