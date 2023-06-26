<?php 

session_start();
require "../../controller/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $id = $_POST['id'];
   $id = htmlspecialchars(trim($id));
   $role = $_POST['role'];
   $table = "tms_".$role;

   $del = mysqli_query($connection, "DELETE FROM $table WHERE emp_id = '$id'");

   header("Location: ../dashboard/dashboard_admin.php");
   if($del){
    return "<h4>Deleted</h4>";
   } else {
    return "<h4>Failed</h4>";
   }



    
}

?>