<?php
 session_start();
 if(!isset($_SESSION['username'])){
    header("Location: http://localhost/register_form/index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- boostrapt cdn  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body{
    background-image:url("img/bg-img-2.jpeg");
    background-repeat:no-repeat;
    background-size:cover;
  }
 
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Wellcome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $_SESSION['username'];?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

</body>
</html>