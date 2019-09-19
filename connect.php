<?php

session_start();

// initializing variables
$user = "";
$password    = "";
$errors = array();


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'formidable');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $user = mysqli_real_escape_string($db, $_POST['user']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirmpass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user)) { array_push($errors, "ID is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $sql = "SELECT * FROM users WHERE user='$user' AND password1='$password_1' LIMIT 1";
  $result = mysqli_query($db, $sql);
  $use = mysqli_fetch_assoc($result);

  if ($username) { // if user exists
    if ($username['user'] === $user) {
      array_push($errors, "Username already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name,email,user,password1)
  			  VALUES('$name','$email','$user','$password')";
  	mysqli_query($db, $query);
      $_SESSION['user'] = $user;

  	$_SESSION['success'] = "You are now logged in";
  	header('location:homepage.php');
  }
}
// ...

?>
