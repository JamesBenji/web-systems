<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label>Enter your new password <br></label>
        <input type="text" name="pass">
        <label>Confirm password<br></label><br>
        <input type="text" name="conf_pass"><br>

        <input type="submit" value="Set New Password">
    </form>

    <?php 
    require "functions.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pass = $_POST['pass'];
            $conf_pass = $_POST['conf_pass'];
            if (!empty($pass)&& !empty($conf_pass) ){
                if($pass == $conf_pass){
                    updateNewUserPass($pass, $connection);
                    exit();
                }
            }
            
        }
    ?>
</body>
</html>