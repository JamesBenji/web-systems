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

    $data = mysqli_query($connection, "SELECT email, residence,tel_no, work_status FROM $table WHERE emp_id = '$emp_id'")->fetch_assoc();
    $email = $data['email'];
    $tel_no = $data['tel_no'];
    $residence = $data['residence'];
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

       <nav>
            <section class="d_details">
                <div><b><?php echo $user; ?>'s Dashboard</b><br><?php echo $emp_id; ?></div>
            
            </section>

            <section class="d_actions">
            <button class="l-nav-btn" > <a href="#rec-del">Report</a> </button> 
            <button onclick="show_D_Profile()" class="l-nav-btn" id="profile-btn"> <a href="#profile">Profile</a> </button> 
            </section>

            <!-- <img class="img-bottom" src="../hima_logo.png" alt="">  -->


            <section style="display: flex; align-items:center; justify-content:center;">
            <img src= "<?php echo $img_src_raw_data; ?>" 
            alt="" 
            id="user_img"
            style="width: 50px; height:50px; border-radius: 50%;"
            >

            </section>
       </nav>
    <!-- <section class="left-nav"> -->
<!-- 
</section>  -->

    <div class="main-content"> 
        <form  action="../../controller/logout.php" method="post">
        <div id="hr-dash-nav">
        
                <div id="header"><span>Driver Dashboard</span> 
                    <input type="submit" value="Log Out" class="nav-btn" 
                    style="
                    text-decoration: none;
                    color: #fff;
                    background-color: #009688;
                    padding: 10px 12px;
                    border: 2px solid #111;
                    border-radius: .5rem;
                    font-weight: 500;
                    transition: all 1s;
                    font-size: 1rem;
                    ">
                </div>
                
                <div id="greeting">Welcome <?php echo $user;?></div>
                <hr id="-hr">
        </div>
        <div id="profile">

        </div>

        <div id="dash-info">
            <label>Current Delivery</label><br>

            
            <div id="cur-del">
                <table >
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

            <label>Recent Deliveries / Report</label> <br>
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
    <script>
        let output_area = document.getElementById('profile')
        output_area.hidden = true

        function show_D_Profile(){
            output_area.hidden = !output_area.hidden
            
            output_area.style.border = "5px solid #009688"

            let content = "<h5>Name: "+"<?php echo $user; ?>"+"</h5>"+
                          "<h5>Employee ID: "+"<?php echo $emp_id; ?>"+"</h5>"+
                          "<h5>Email: "+"<?php echo $email; ?>"+"</h5>"+
                          "<h5>Residence: "+"<?php echo $residence; ?>"+"</h5>";



            output_area.innerHTML=content
        }
    </script>
    <script src="./dash_update_dr.js"></script>
    
</body>
</html>
