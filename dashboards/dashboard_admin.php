<?php session_start();
    require "../phpfiles/functions/config.php";
    
    $table = $_SESSION['table'];

    $username = $_SESSION['username'];
    $emp_id = $_SESSION['emp_id']; 

    $img_q = $connection -> prepare("SELECT emp_img FROM $table WHERE emp_id = ?");
    $img_q -> bind_param("s", $emp_id);
    $img_q -> execute();

    $res = $img_q -> get_result();

    if($res && $res ->num_rows > 0){
        $img = $res -> fetch_assoc();
        $img_data = $img['emp_img'];
        $img_src_raw_data = "data:image/jpeg/png;base64, " . base64_encode($img_data);
    } else {
        $img_src_raw_data = '';
    }


?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dash_mod_2.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav>
        <div>Admin <?php echo $username; ?>'s<br> Dashboard</div>
        <div><button type="button" onclick="showAddUser()">Add user</button></div>
        <div><button type="button" onclick="showUpdateUser()">Update User Info</button></div>
        <div><button type="button" onclick="showDeleteUser()">Delete User</button></div>
        <div id="img_icon" > 
            
          
            <img 
                src="<?php echo $img_src_raw_data; ?>" 
                alt="Admin img"
                style="width: 40px; height:40px; border-radius: 50%;"
                >
 
        </div>
    </nav>

    <main id="content-area">
        

    </main>
    <form  action="../phpfiles/functions/logout.php" method="post">
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
                    margin-left: 40%;
                    "></form>

    <script>
    let img = document.querySelector('#img_icon img');
    img.addEventListener('click', (e) => {
        let accOpt = document.querySelector('#acc-opt');
        accOpt.style.display = accOpt.style.display === 'block' ? 'none' : 'block';
    });
    </script>

    <script>
        // if this is clicked set the innerHTML of the content-area to ...
        let content_area = document.querySelector('#content-area')
        function showAddUser(){
            let add_content ="<label>First name: <input type='text' name='f_name'></label><br>" +
            "<label>Last name: <input type='text' name='l_name'></label><br>" +
            "<label>Sex: <input type='text' name='sex'></label><br>" +
            "<label>Telephone number: <input type='text' name='tel_no'></label><br>" +
            "<label>Email: <input type='text' name='email'></label><br>" +
            "<label>Residence: <input type='text' name='residence'></label><br>" +
            "<label>Date of Birth: <input type='date' name='dob'></label><br>" +
            "<label>Image: <input type='file' name='img'></label><br>" +
            "<label>Permit number: <input type='text' name='permit_no'></label><br>" +
            "<label><input type='submit' value='Create driver'></label><br>" ;
            content_area.innerHTML = "<form name='add_user' id='addUserForm' action='../phpfiles/admin_ops/addUser.php' method='post'><h3>Add User</h3>" + add_content +"</form>";
        }

        function showUpdateUser(){
            let add_content ="<label>Employee number: <input type='text' name='id'></label><br><label>First name: <input type='text' name='f_name'></label><br>" +
            "<label>Last name: <input type='text' name='l_name'></label><br>" +
            "<label>Sex: <input type='text' name='sex'></label><br>" +
            "<label>Telephone number: <input type='text' name='tel_no'></label><br>" +
            "<label>Email: <input type='text' name='email'></label><br>" +
            "<label>Residence: <input type='text' name='residence'></label><br>" +
            "<label>Date of Birth: <input type='date' name='dob'></label><br>" +
            "<label>Image: <input type='file' name='img'></label><br>" +
            "<select name='role'><option value='driver'>Driver</option><option value='manager'>Manager</option></select><br>" +
            "<label><input type='submit' value='Create driver'></label><br>" ;
            content_area.innerHTML = "<form name='add_user' action='../phpfiles/admin_ops/admin_ops/updateUser.php' method='post'><h3>Update User Details</h3>" + add_content +"</form>";
        }

        function showDeleteUser(){
            let delete_content = "<label>Enter the employee number: <input type='text' name='id'/><br><select name='role'><option value='driver'>Driver</option><option value='manager'>Manager</option></select></label><br><input type='submit'/>"
            content_area.innerHTML = "<form name='add_user' action='../phpfiles/admin_ops/admin_ops/deleteUser.php' method='post'><h3>Update User Details</h3>" + delete_content +"</form>";
        }
        


    </script>

</body>
</html>