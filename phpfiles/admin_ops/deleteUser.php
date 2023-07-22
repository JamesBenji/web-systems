<?php 

session_start();
// checked

require "../functions/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $id = $_POST['id'];

   $id = htmlspecialchars(trim($id));

   $role = $_POST['role'];

   $table = "tms_".$role;

   $del = mysqli_query($connection, "DELETE FROM $table WHERE emp_id = '$id'");

   header("Location: ../../dashboards/dashboard_admin.php");

   if($del){

    echo "<h4>Deleted</h4>";

   } else {

    echo "<h4>Failed</h4>";

   }   
}

?>