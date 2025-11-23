<?php
session_start();
require "connection.php";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = $_POST['password']; 

    $query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if($user && password_verify($password, $user['password'])){

        $_SESSION['user']= $user['full_name'];
        header("location: welcome.php");
        exit();
        
    }else{
        $error = "Incorrect email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkedIn Login</title>

<style>
    body {
        background: #f3f2ef;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .logo {
        margin: 40px 0 0 80px;
    }
    .logo img {
        height: 34px;
    }
    .card {
        width: 420px;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }
    .social-btn {
        width: 100%;
        padding: 14px;
        border: 1px solid #cfcfcf;
        border-radius: 25px;
        font-size: 16px;
        background: #fff;
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 12px;
        cursor: pointer;
    }
    .social-btn img {
        height: 20px;
    }
    small a {
        color: #0a66c2;
        text-decoration: underline;
    }
    .or-line {
        text-align: center;
        margin: 25px 0;
        color: #777;
    }
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 13px;
        border-radius: 5px;
        border: 1px solid #cfcfcf;
        margin-bottom: 15px;
        font-size: 16px;
    }
    .show {
        color: #0a66c2;
        float: right;
        margin-top: -40px;
        margin-right: 10px;
        cursor: pointer;
    }
    .forgot {
        color: #0a66c2;
        margin: 10px 0;
        text-decoration: none;
        font-size: 15px;
        display: block;
    }
    .signin-btn {
        width: 100%;
        background: #0a66c2;
        border: none;
        padding: 14px;
        color: white;
        font-size: 18px;
        border-radius: 25px;
        cursor: pointer;
        margin-top: 12px;
    }
    .signin-btn:hover{
      background: #07223dff;    
    }
    .checkbox-div {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 10px 0;
    }
    .bottom {
        text-align: center;
        margin-top: 20px;
    }
    .bottom a {
        color: #0a66c2;
        font-weight: bold;
        text-decoration: none;
    }
    
</style>
</head>
<body>

<div class="logo">
    <img src="pic/linkedIn_logo.svg">
</div>

<div class="card">
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>


    <h2>Sign in</h2>

    <form method="POST">

    <button class="social-btn">
        <img src="pic/google.png"> Continue with Google
    </button>

    <button class="social-btn">
        <img src="pic/microsoft.png"> Sign in with Microsoft
    </button>

    <button class="social-btn">
        <img src="pic/apple.png"> Sign in with Apple
    </button>

    <small>
        By clicking Continue, you agree to LinkedIn’s
        <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>,
        and <a href="#">Cookie Policy</a>.
    </small>

    <div class="or-line">————— or —————</div>

    <input type="text" name="email" placeholder="Email or phone" required>

    <div style="position: relative;">
        <input type="password" name="password" placeholder="Password" required>
        <span class="show">Show</span>
    </div>

    <a class="forgot" href="#">Forget password?</a>

    <div class="checkbox-div">
        <input type="checkbox"> <label>Keep me logged in</label>
    </div>

    <button class="signin-btn" type="submit" name="login">Sign in</button>

    <div class="bottom">
        New to LinkedIn? <a href="signup.php">Join now</a>
    </div>

 </form>

</div>

</body>
</html>