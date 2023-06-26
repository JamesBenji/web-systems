<?php session_start(); 
    require "../../controller/config.php";

    //fetch img
    $table = $_SESSION['table'];
    $user = $_SESSION['username'];
    $emp_id = $_SESSION['emp_id']; 

    $img_q = $connection -> prepare("SELECT emp_img FROM $table WHERE emp_id = ?");
    $img_q -> bind_param("s", $emp_id);
    $img_q -> execute();

    $res = $img_q -> get_result();

    $email = mysqli_query($connection, "SELECT email FROM $table WHERE emp_id = '$emp_id'") -> fetch_assoc()['email'];

    // $img_query = "";
    // $result = $connection -> query($img_query);

    if($res && $res ->num_rows > 0){
        $img = $res -> fetch_assoc();
        $img_data = $img['emp_img'];
        $img_src_raw_data = "data:image/jpeg/png;base64, " . base64_encode($img_data);
    } else {
        $img_src_raw_data = '';
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dash_driver.css">
    <title>Driver Dashboard</title>
</head>
<body>
    <section class="left-nav">
        <img src= "<?php echo $img_src_raw_data; ?>" 
        alt="" 
        id="user_img"
        style="width: 100px; height:100px; border-radius: 50%;"
        >
        <div><?php echo $user; ?></div>
        <div><?php echo $emp_id; ?></div> 
        <div><?php echo $email; ?></div> 


        <section><button onclick="showReport()" class="l-nav-btn" > <a href="#rec-del">Drivers' Report</a> </button> </section>


        <img class="img-bottom" src="../hima_logo.png" alt=""> 

</section> 

    <div class="main-content"> 
        <form  action="../controller/logout.php" method="post">
        <div id="hr-dash-nav">
        
                <div id="header"><span>Driver Dashboard</span> 
                    <input type="submit" value="Log Out" class="nav-btn" 
                    style="
                    text-decoration: none;
                    color: #fff;
                    background-color: var(--hima_green);
                    padding: 0.3rem 1rem;
                    border: 2px solid #fff;
                    border-radius: .5rem;
                    font-weight: 500;
                    transition: all 1s;
                    font-size: 1rem;
                    ">
                </div>
                
                <div id="greeting">Welcome <?php echo $user;?></div>
                <hr id="-hr">
        </div>

        <div id="dash-info">
            <label>Current Delivery</label><br>

            
            <div id="cur-del">
                <table>
                    <thead>
                        <th>Delivery Details</th>
                        <th>Location</th>
                        <th>Truck</th>
                        <th>Deadline</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tbody_cur">

                    </tbody>
                </table>
            </div>

            <label>Upcoming Deliveries</label> <br>
            <div id="up-del">
            <table>
                    <thead>
                        <th>Delivery Details</th>
                        <th>Location</th>
                        <th>Truck</th>
                        <th>Deadline</th>
                        <th>Quantity</th>
                    </thead>
                    <tbody id="tbody_up">

                    </tbody>
                </table>
            </div>

            <label>Recent Deliveries</label> <br>
            <div id="rec-del">
            <table>
                    <thead>
                        <th>Delivery Details</th>
                        <th>Location</th>
                        <th>Truck</th>
                        <th>Deadline</th>
                        <th>Quantity</th>
                    </thead>
                    <tbody id="tbody_rec">

                    </tbody>
                </table>
            </div>


        </div>

        </form> 




    </div>
    <script src="./dash_update_dr.js"></script>
</body>
</html>
