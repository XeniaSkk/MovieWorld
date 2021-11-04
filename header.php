<?php 
    session_start();
    include_once 'moviedb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieWorld</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
      <li class="nav-item"><h1 class="navbar-brand">Movie World</h1></li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <?php
        if(isset($_SESSION["userLoggedIn"])) {
          echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
        }
        else{
          echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>';
        }
        ?>
        <?php if (isset($_SESSION["userLoggedIn"])): ?>
          <li class="nav-item"><h4 class="navbar-brand">Welcome <?= $_SESSION["userLoggedIn"]; ?></h4></li>
        <?php endif ?>
    
        <?php 
        if (isset($_SESSION["userLoggedIn"])){
            echo '<li class="nav-item"><a href="upload.php" type="button" class="btn btn-success">New Movie</a></li>';}
            ?>
        </ul>
  </div>
</nav>
</div>