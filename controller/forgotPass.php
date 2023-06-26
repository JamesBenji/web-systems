<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseet Password</title>
</head>
<body>
    <form action="" method="post">
        <label>Enter your email <br></label><br>
        <input type="email" name="email"><br>
        <label>Enter your telephone number <br></label><br>
        <input type="text" name="tel_no"><br>
        <input type="submit" value="Reset Password"><br>
    </form>

    <?php 
    require "functions.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $tel_no = $_POST['tel_no'];

        $stmt = $connection -> prepare("SELECT * FROM tms_driver WHERE email = ? AND tel_no = ?");
        $stmt -> bind_param("ss", $email, $tel_no);
        $stmt -> execute();

        $res = $stmt -> get_result();
        $row = $res -> fetch_assoc();

        if(mysqli_num_rows($res) == 1){

            header("Location: newPass_forgot.php");
        } else {
            echo "Account not found <br> <a href='create_acc.php'> Create an account </a>";
            echo mysqli_num_rows($res);
        }
    }
    ?>
</body>
</html>