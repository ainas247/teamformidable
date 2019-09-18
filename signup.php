<?php
require_once('connect.php');
$_SESSION['message']='';

if($_SERVER['REQUEST_METHOD']=='POST'){

	//two passwords are equal to each other
	if($_POST['password1']==$_POST['confirmpass']){
	$name=$db->real_escape_string($_POST['name']);
	$email=$db->real_escape_string($_POST['email']);
	$user= $db->real_escape_string($_POST['user']);
	$password=$db->real_escape_string($_POST['password1']);

	$_SESSION['user']=$user;
	$sql = "INSERT INTO users (name,email,user,password1,)". "VALUES ('$name','$email','$user',$password')";
	//if the query is correct it will redirect to index.php
	if($db->query($sql)===true){
	$_SESSION['message']='Registration succesfully Added $official to the database';
	header("location:homepage.php");
	}
	else{
		$_SESSION['message']="User could not be added to the database";
	}
	}
	else{
		$_SESSION['message']="Two password do not match";
	}
	}