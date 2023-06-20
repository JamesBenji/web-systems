<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form action="updatePass.php" method="post">
        <label for=""><h3>Hello <?php echo @$_SESSION['username']; ?> Create a New Password</h3></label><br>
        <input type="text" name="newPass">
        <input type="submit" value="Submit New Password">
    </form>
    
</body>
</html>