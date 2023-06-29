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
    <title>Manager Dashboard</title>
</head>
<body>


    <nav>
    <section class="d_details">
                <div><b><?php echo $user; ?>'s Dashboard</b><br><?php echo $emp_id; ?></div>
                
    </section>
    <section class="d_actions" id="manager_nav">
        <button onclick="showProfile();" type="button" class="l-nav-btn">Profile</button>
        <button onclick="showReport()" class="l-nav-btn">Drivers' Report</button>
        <button onclick="showStat()" class="l-nav-btn">Statistics</button>
        <button onclick="showSearch()" type="button" class="l-nav-btn">Search Driver</button>
    </section>

    <section class="left-nav">
        <img src= "<?php echo $img_src_raw_data; ?>" 
        alt="" 
        id="user_img"
        style="width: 50px; height:50px; border-radius: 50%;"
        >

</section> 


    </nav>
    

    <div class="main-content"> 
        <form  action="../../controller/logout.php" method="post" id="main-c-form">
        <div id="hr-dash-nav">
        
                <div id="header"><span>Manager Dashboard</span> 
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

                <div id="profile-show"></div>

                <div id="driver-report"></div>

                <div id="statistics"></div>

                <div id="search-driver" hidden="true"></div>
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
        let prof_inner_html = "<h1 style='margin-bottom: 30px;'>Profile</h1>" +
        "<h3>Name: <span id='p_name'></span> </h3><br>" +
        "<h3>Email: <span id='p_email'></span> </h3><br>" +
        "<h3>Telephone: <span id='p_tel'></span> </h3><br>" +
        "<h3>Residence: <span id='p_res'></span> </h3><br>";

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
                                    + '<b>Remaining tasks:</b> ' + rows[i].count_incomplete + '<br>'
                                    + '<table style="background-color:#009688; text-align:center; border-radius:4px; margin-top:1rem; padding:3px;"> <tr><th>Month</th><th>Deliveries</th></tr>'
                                    + '<tr> <td> January :</td>' + '<td>' + rows[i].count_jan + '</td></tr>'
                                    + '<tr> <td> February :</td>' + '<td>' + rows[i].count_feb + '</td></tr>'
                                    + '<tr> <td> March :</td>' + '<td>' + rows[i].count_mar + '</td></tr>'
                                    + '<tr> <td> April :</td>' + '<td>' + rows[i].count_apr + '</td></tr>'
                                    + '<tr> <td> May :</td>' + '<td>' + rows[i].count_may + '</td></tr>'
                                    + '<tr> <td> June :</td>' + '<td>' + rows[i].count_jun + '</td></tr>'
                                    + '<tr> <td> July :</td>' + '<td>' + rows[i].count_jul + '</td></tr>'
                                    + '<tr> <td> August :</td>' + '<td>' + rows[i].count_aug + '</td></tr>'
                                    + '<tr> <td> September :</td>' + '<td>' + rows[i].count_sep + '</td></tr>'
                                    + '<tr> <td> October :</td>' + '<td>' + rows[i].count_oct + '</td></tr>'
                                    + '<tr> <td> November :</td>' + '<td>' + rows[i].count_nov + '</td></tr>'
                                    + '<tr> <td> December :</td>' + '<td>' + rows[i].count_dec + '</td></tr></table>';

                                    

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

// search driver

    let search_div = document.getElementById("search-driver")
    search_div.hidden = true;
    function showSearch(){
            let search_div = document.getElementById("search-driver")
            search_div.hidden = !search_div.hidden;
    }
    let search_content = "<br><input id='f_name' type='text' placeholder='Driver first name' onchange='setFN()' style='min-width: 200px'>" + 
                         "<br><input id='l_name' type='text' placeholder='Driver last name' onchange='setLN()' style='min-width: 200px'>"+
                         "<br><input type='button' id='sub-btn' value='Search' class='nav-btn' style='text-decoration: none; min-width: 200px; text-decoration:none;color:#fff;padding:10px 12px; border: 2px solid #111; border-radius:.5rem; font-weight:500; font-size:1rem; transition: all 1s; background-color: #009688'> <br>";

    search_div.innerHTML = "<form action='./searchDriver.php' method='post'>" + search_content + "</form> <div id='search_res'> </div>"

        let f_name, l_name

        function setFN() {
            f_name = document.getElementById('f_name').value;
            console.log(f_name)
        }

        function setLN() {
            l_name = document.getElementById('l_name').value;
            console.log(l_name)
        }

        document.getElementById('f_name').addEventListener('change', setFN());
        document.getElementById('l_name').addEventListener('change', setLN());
        document.getElementById('sub-btn').addEventListener('click',()=>{
            var xhr = new XMLHttpRequest();

            let data = {f_name: f_name, l_name: l_name}
                xhr.open("POST", "./searchDriver.php", false);
                xhr.setRequestHeader("Content-Type", "utf-8");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                    var res = JSON.parse(this.responseText);

                    let table = document.createElement('table')
                    // table headers
                    let thead = document.createElement('thead')

                    let thead_content = "<th>Name</th>" + 
                                        "<th>Location today</th>" + 
                                        "<th>Description</th>" + 
                                        "<th>Delivery status</th>" + 
                                        "<th>Truck</th>" + 
                                        "<th>Driver status</th>";

                    thead.innerHTML = thead_content
                    table.appendChild(thead)
                    
                    

                    console.log("PHP Script response: "+res);
                    let tbody_content = "<td>"+ res.name +"</td>" + 
                                        "<td>"+ res.delivery_location +"</td>" + 
                                        "<td>"+ res.order_desc +"</td>" + 
                                        "<td>"+ res.delivery_status +"</td>" + 
                                        "<td>"+ res.truck_no_plate +"</td>" + 
                                        "<td>"+ res.work_status +"</td>";
                    
                    let tbody = document.createElement('tbody')
                    tbody.innerHTML = tbody_content;
                    table.appendChild(tbody)
                    document.getElementById('search_res').appendChild(table)

                    }
                };
                xhr.send(JSON.stringify(data));
                console.log("sent data: "+JSON.stringify(data));
        })


       

// expect input of name or emp_id and receive location, delivery details and monthly report

    </script>
</body>
</html>
