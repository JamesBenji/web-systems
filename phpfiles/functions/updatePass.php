<?php 

session_start(); 
// checked

require "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST['newPass']) && !empty($_POST['conf_newPass'])){


        if($_POST['newPass'] == $_POST['conf_newPass']){

            $newPass = $_POST['newPass'];

            $newPass = htmlspecialchars($newPass);

            $newPass = trim($newPass);

            $status = updateNewUserPass($newPass, $_SESSION['emp_id'], $connection);

            if($status == "success"){

                echo "<br>$status";

                echo $_SESSION['emp_id'];

            } else {

                echo "<br>$status";

            }
        }
        
    }

    else{

        echo "re-enter password";

    }

}
?>

