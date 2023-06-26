<?php session_start(); 
    require "../../controller/config.php";

    //fetch img
    $user = $_SESSION['username'];
    $emp_id = $_SESSION['emp_id'];
    $table = $_SESSION['table'];

    $data_q = $connection -> prepare("SELECT email, residence, tel_no, emp_img FROM $table WHERE emp_id = ?");
    $data_q -> bind_param("s", $emp_id);
    $data_q -> execute();

    $res = $data_q -> get_result();

    // $data_query = "";
    // $result = $connection -> query($data_query);

    if($res && $res ->num_rows > 0){
        $row = $res -> fetch_assoc();
        $img_data = $row['emp_img'];
        $img_src_raw_data = "data:image/jpeg/png;base64, " . base64_encode($img_data);

        $email = $row['email'];
        $residence = $row['residence'];
        $tel_no = $row['tel_no'];

    } else {
        $img_src_raw_data = '';
    }

    $connection -> close();


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
        <section ><button onclick="showProfile();" type="button" class="l-nav-btn">Profile</button></section>
        <section><button onclick="showReport()" class="l-nav-btn">Drivers' Report</button> </section>
        <section><button onclick="showStat()" class="l-nav-btn">Statistics</button> </section>

        <img class="img-bottom" src="../hima_logo.png" alt=""> 

</section> 

    <div class="main-content"> 
        <form  action="../../controller/logout.php" method="post" id="main-c-form">
        <div id="hr-dash-nav">
        
                <div id="header"><span>Manager Dashboard</span> 
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

                <div id="profile-show"></div>

                <div id="driver-report"></div>

                <div id="statistics"></div>
        </div>

       
        </form> 




    </div>
    <!-- ################################################################################################ -->
    <script >
        // Declare profileDiv outside the showProfile function
        let profileDiv = document.createElement('div');
        profileDiv.classList.add('profile-div');
        profileDiv.hidden = true;

        // Set the content of the profileDiv
        let prof_inner_html = "<h1>Profile</h1>" +
        "<div>Name: <span id='p_name'></span> </div><br>" +
        "<div>Email: <span id='p_email'></span> </div><br>" +
        "<div>Telephone: <span id='p_tel'></span> </div><br>" +
        "<div>Residence: <span id='p_res'></span> </div><br>";

        profileDiv.innerHTML = prof_inner_html;

        // Append the profileDiv to the profile-show element
        document.getElementById('profile-show').appendChild(profileDiv);

        // Set the text content of the profile fields
        document.getElementById('p_name').textContent = "<?php echo $user; ?>";
        document.getElementById('p_email').textContent = "<?php echo $email; ?>";
        document.getElementById('p_tel').textContent = "<?php echo $tel_no; ?>";
        document.getElementById('p_res').textContent = "<?php echo $residence; ?>";

function showProfile() {
    profileDiv.hidden = !profileDiv.hidden;
}
/////////////////////////////////////////////////////////////////////////
let driver_report = document.getElementById('driver-report');
driver_report.classList.add('report-div');
driver_report.hidden = true;

let table = document.createElement('table');
let thead = document.createElement('thead');
let thead_row = document.createElement('tr');

let th_driver = document.createElement('th');
th_driver.textContent = 'Driver';
let th_report = document.createElement('th');
th_report.textContent = 'Report';

thead_row.appendChild(th_driver);
thead_row.appendChild(th_report);
thead.appendChild(thead_row);

let tbody = document.createElement('tbody');

// Obtain data
let xhttp2 = new XMLHttpRequest();
xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let rows = JSON.parse(this.responseText);
        console.log(rows);
        // Iterate over the rows and create <tr> elements with <td> cells
        for (let i = 0; i < rows.length; i++) {
            let row = document.createElement('tr');
            row.classList.add("row")
            let td_driver = document.createElement('td');
            td_driver.textContent = rows[i].emp_f_name + ' ' + rows[i].emp_l_name;
            let td_report = document.createElement('td');
            td_report.innerHTML = '<b>Driver no :</b> '+ rows[i].emp_id +'<br><br>'
                                    +'<h3>Contact :</h3>'+ rows[i].emp_email +'<br>'+ rows[i].emp_tel_no +'<br><br>'
                                    + '<b>Ongoing tasks:</b> ' + rows[i].count_ongoing + '<br>'
                                    + '<b>Completed tasks:</b> ' + rows[i].count_complete + '<br>'
                                    + '<b>Remaining tasks:</b> ' + rows[i].count_incomplete + '<br>';
                                    

            row.appendChild(td_driver);
            row.appendChild(td_report);
            tbody.appendChild(row);
        }
    }
};

xhttp2.open('GET', './fetch_report.php', true);
xhttp2.send();

table.appendChild(thead);
table.appendChild(tbody);
driver_report.appendChild(table);

let report_table = document.querySelector('#driver-report table')
report_table.hidden = true;

function showReport() {
    report_table.hidden = !report_table.hidden;
}

let stat_area = document.querySelector('#statistics')
stat_area.hidden = true

let xhttp3 = new XMLHttpRequest();
xhttp3.onreadystatechange = function (){
    if(this.readyState == 4 && this.status == 200){
        console.log(this.responseText)
        stat_obj = JSON.parse(this.responseText)

        stat_area.innerHTML = '<h3>Available drivers</h3>' + stat_obj.available_d +
                              '<h3>Incomplete deliveries</h3>' + stat_obj.remaining_del +
                              '<h3>Done Deliveries</h3>' + stat_obj.done_del +
                              '<h3>Ongoing deliveries</h3>' + stat_obj.ongoing_del +
                              '<h3>Total stock delivered</h3>' + stat_obj.total_qty + ' bags of 50kg' ;
        
    }
}

xhttp3.open("GET", "./fetch_stat.php", true);
xhttp3.send()





function showStat(){
    stat_area.hidden = !stat_area.hidden

}

    </script>
</body>
</html>
