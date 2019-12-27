<?php
session_start();
require('db.php');

$username="";
$errors = array(); 


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");

    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Management System - GYM</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="noydir">
	<meta name="robots" content="noodp">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/indexStyle.css">
  
</head>
<body>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container-fluid"></div>
	</nav>
	<h2 style="color:white; text-align:center;">ADMIN AREA</h2>
	<form class="form " action="" method="post">
		<input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
		<input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
		<button type="submit" class="btn btn-outline-light mb-2" name="login_user">Login</button>
	</form>
	
</body>
</html>