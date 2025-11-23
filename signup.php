<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkedIn Sign Up</title>

<style>
    body {
        background: #f3f2ef;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    .logo {
        margin-top: 40px;
        width: 20%;
        height:20%;
    }
    .logo img {
        height: 34px;
    }
    h1 {
        margin-top: 15px;
        font-size: 28px;
        font-weight: 500;
    }
    .card {
        width: 420px;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        text-align: left;
    }
    label {
        font-size: 15px;
        font-weight: bold;
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
    .checkbox-div {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 10px 0;
    }
    small a {
        color: #0a66c2;
        text-decoration: underline;
    }
    .join-btn {
        width: 100%;
        background: #0a66c2;
        border: none;
        padding: 14px;
        color: white;
        font-size: 18px;
        border-radius: 25px;
        cursor: pointer;
        margin: 25px 0 15px 0;
    }
    .join-btn:hover{
      background: #07223dff;    
    }
    .or-line {
        text-align: center;
        margin: 20px 0;
        color: #777;
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
    .bottom {
        text-align: center;
        margin-top: 20px;
        font-size: 15px;
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

<h1>Make the most of your professional life</h1>

<div class="card">
    <form method="POST">
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <label>Full Name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="text" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <div class="checkbox-div">
        <input type="checkbox" checked>
        <label>Keep me logged in</label>
  
    </div>

    <small>
        By clicking Continue, you agree to LinkedIn’s
        <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>,
        and <a href="#">Cookie Policy</a>.
    </small>

    <button class="join-btn" type='submit' name='signup'>Agree&Join</button>

    <div class="or-line">————— or —————</div>

    <button class="social-btn">
        <img src="pic/google.png"> Continue with Google
    </button>

    <button class="social-btn">
        <img src="pic/microsoft.png"> Continue with Microsoft
    </button>

    <div class="bottom">
        Already on LinkedIn? <a href="login.php">Sign in</a><br><br>
        Looking to create a page for a business? <a href="#">Get help</a>
    </div>
 </form>  
</div>

</body>
</html>
<?php
require "connection.php";
if(isset($_POST['signup'])){
  $name=mysqli_real_escape_string($con,$_POST['name']);
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $check=mysqli_query($con,"SELECT * FROM users WHERE email='$email' ");
  if(mysqli_num_rows($check)>0){
     $error = "Email already exists!";
  }else{

    $sql="INSERT INTO users (full_name,email,password) VALUES  ('$name','$email','$password')";

    if(mysqli_query($con,$sql)){
        $_SESSION['user'] = $name;
         header("location: welcome.php");
         exit();
    }else{
        $error="Something Wrong";
    }
  }

}
?>
