<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginpage.css">
    <title>Login</title>
    
</head>
<body >
    <!-- Login Page -->
   <div class="large-background"> 
    <section class="small-background">   <br>
    <h1>Login</h1> 
    <p>Enter Your company ID and Password <br> below to login</p>


    <form action="./phpfiles/functions/authUser.php" method="post">
        <input type="text" name="CompanyID" id="CompanyID" placeholder="Company ID" required> <br>
        <span id="warning-id"></span>
        <br>
        <input type="text" name="password" id="password"  placeholder="Password" required> <br> 
        <span id="warning-password"></span>
        <br>
        <label>Role: <select name="role">
            <option value="driver">Driver</option>
            <option value="manager">Manager</option>
            <option value="web_app_admin">Admin</option>
        </select></label><br><br>
        <a href="./phpfiles/functions/forgotPass.php" id="f_pass">Forgot Password? </a> <br> <br>
        <input type="submit" name="login" id="login" value="Login User" > 

    </form>

    </section>
</div>


<script>
  document.addEventListener("DOMContentLoaded", () => {
    const submit_btn = document.getElementById('login');
    submit_btn.disabled = true;

    const companyID_DIv = document.getElementById('CompanyID');
    const password_DIv = document.getElementById('password');
    const warning_id = document.getElementById('warning-id');
    const warning_password = document.getElementById('warning-password');

    let isIDCorrect = false;
    let isPassCorrect = false;

    companyID_DIv.addEventListener('input', (e) => {
      const id = e.target.value;
      if (id.length < 4) {
        warning_id.innerHTML = "Too short. Id must be at least 4 characters";
        isIDCorrect = false;
      } else {
        warning_id.textContent = "Ok";
        isIDCorrect = true;
      }

      checkFormValidity();
    });

    password_DIv.addEventListener('input', (e) => {
      const pass = e.target.value;
      if (pass.length < 5) {
        warning_password.innerHTML = "Too short";
        isPassCorrect = false;
      } else if (pass.length > 10) {
        warning_password.textContent = "Too long";
        isPassCorrect = false;
      } else {
        warning_password.textContent = "Ok";
        isPassCorrect = true;
      }

      checkFormValidity();
    });

    function checkFormValidity() {
      if (isIDCorrect && isPassCorrect) {
        submit_btn.disabled = false;
      } else {
        submit_btn.disabled = true;
      }
    }
  });
</script>
</body>
</html>