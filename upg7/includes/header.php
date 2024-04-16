<?php
require_once 'includes/class.user.php';
require_once 'includes/config.php';
$user = new User($pdo);

if(isset($_GET['logout'])){
  $user->logout();
}
?>

<!DOCTYPE html>
<html>
<body>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style.css">
<title>Fake Steam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<header class="container-fluid bg-dark ">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
  <a class="navbar-brand" href="index.php">Fake Steam</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="index.php">Games</a>
        </li>
        <li class="nav-item"> 
        <a class="nav-link " href="addGame.php">Add game</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link " href="login.php">Login</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link " href="account.php">Account</a>
      </li>
      </li>
      <li class="nav-item"> 
        <a class="nav-link " href="?logout=1">Logout</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="hero-section row align-items-center justify-content-center">
		<div class="col-sm-6 px-5">
			<h1>The best of the best!</h1>
			<p>Do you want the best prices on games? Lorem ipsum dolor sit amet nulla extempore interior.</p>
		</div>
		<div class="col-sm-6"></div>
	</div>
</header>