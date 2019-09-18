<?php
require_once('connect.php');

// LOGIN USER
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($db, $_POST['user']);
    $password = mysqli_real_escape_string($db, $_POST['password1']);
  
    if (empty($user)) {
        array_push($errors, "ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE user='$user' AND password1='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['user'] = $user;
          $_SESSION['success'] = "You are now logged in";
          header("location:homepage.php");
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <!--Main Wrapper
===========================-->
<div class="main__wrapper">
    <img src="./assets/plant.svg" class="plant1" alt="">
    <img src="./assets/plant.svg" class="plant2" alt="">
    <img src="./assets/group.svg" class="plant3" alt="">
    <img src="./assets/plant.svg" class="plant4" alt="">
    <div class="container">
        <div class="main__wrapper__content">
            <div class="main__wrapper--left">
                <img src="./assets/banner.png" class="wrapper__img" alt="">
            </div>
            <div class="main__wrapper--right">
                <!--Heading for the Logo 
                ============================-->
                <div class="heading">
                    <img src="./assets/logo.svg" class="logo__img" alt="">
                    <h1 class="logo__text">Welcome <br > to Travel Blog</h1>
                </div>
                <!--Logo ends here
                =============================-->
                <!--Form wrapper
                =============================-->
            <div class="form__wrapper">
            <?php include('error.php'); ?>
                <form name="login-form" class="login__form" action="index.php" method="post">
                <div class="email__container">
                        <img src="./assets/user.svg" class="user__img" alt="">
                <!--Added username_or_email id and add required-->
                        <input type="text" placeholder="Username or email" id="username_or_email" name="user" required>
                    </div>
                <!--Added error message div for username and style it to be none -->
                    

                    <div class="password__container">
                            <img src="./assets/lock.svg" class="user__img" alt="">
                <!--Added password id and add required-->
                            <input type="password" placeholder="Password" id="password" name="password1" required>
                        </div>
                 <!--Added error message div for username and style it to be none -->
                       
                        <div class="help">
                            <a href="#">Remeber me</a>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="login__btn" name="submit" id="btn">Login</button>
                        <p>Don't have an account? <a href="#" class="register__link" onclick="toggleSignup()">&nbsp; Click here</a></p>
                </form>
                <!--End of Login Form
                =============================-->
                <!--Register Form
                =============================-->
               <div class="register__form">
                   <h3>Create A Free Account Today!</h3>
                   <?php include('error.php'); ?>
                <form id="registe-form" action="signup.php" method="post">
                    <label for="name">Name *</label>
                    <input type="text" id="register-input" name= "name" value="" required>

                    <label for="email">Email Address *</label>
                    <input type="email" id="register-input" name= "email" value="" required>

                    <label for="username">Username *</label>
                    <input type="text" id="register-input" name= "user" value="" required>

                    <label for="password">Password *</label>
                    <input type="password" id="register-input" name= "password1" value="" required>
                    <button type="submit" class="login__btn" name="reg_user" id="btn">Sign Up</button>
                    <p>Have an account with us? <a href="" class="register__link" onclick="toggleLogin">Login</a></p>
                </form>
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>
