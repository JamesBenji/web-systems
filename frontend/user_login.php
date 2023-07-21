<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpage.css">
    <title>Login</title>
    
</head>
<body >
    <!-- Login Page -->
   <div class="large-background"> 
    <section class="small-background">   <br>
    <h1>Login</h1> 
    <p>Enter Your company ID and Password <br> below to login</p>


    <form action="../controller/authUser.php" method="post">
        <input type="text" name="CompanyID"  placeholder="Company ID" required> <br> <br>
        <input type="text" name="password"   placeholder="Password" required> <br> <br>
        <label>Role: <select name="role">
            <option value="driver">Driver</option>
            <option value="manager">Manager</option>
            <option value="web_app_admin">Admin</option>
        </select></label><br><br>
        <a href="../controller/forgotPass.php" id="f_pass">Forgot Password? </a> <br> <br>
        <input type="submit" name="login" value="Login User"> 

    </form>

    </section>
</div>

</body>
</html>