<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/createPass.css">
    <title>Change Password</title>
</head>
<body>
    <form action="./phpfiles/functions/updatePass.php" method="post">
        <h1>Hello <?php echo @$_SESSION['username']; ?> </h1>
        <h3>Create a New Password</h3>
        <input type="text" name="newPass" placeholder="New Password"><br>
        <h3>Confirm new password</h3><br>
        <input type="text" name="conf_newPass" placeholder="Confirm Password"><br>
        <input type="submit" value="Submit New Password"><br>
    </form>
    
</body>
</html>