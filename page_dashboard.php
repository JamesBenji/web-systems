<?php session_start(); 

if(!isset($_SESSION['authenticated'])){
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2> Welcome <?php echo $_SESSION['username'];?>! </h2>
    <form action="./phpfiles/functions/logout.php" method="post">
        <input type="submit" value="Log out">
    </form>
    
</body>
</html>