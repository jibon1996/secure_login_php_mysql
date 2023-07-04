<?php
 if(isset($_POST['submit'])){
  $conn = mysqli_connect("localhost","root","","users")or die("connection failed");

  $email=$_POST['email'];
  $password=$_POST['password'];
  $incpassword= md5($password);
  

  $query = "SELECT * FROM user_info WHERE email ='{$email}' ";
  $result = mysqli_query($conn,$query)or die("query failed");

  if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $pass = $row['passwords'];
     if($pass === $incpassword){
          session_start();
          $_SESSION['username'] = $row['username'];
          header("Location: http://localhost/register_form/home.php");
     }else{
          echo "<div class='alert alert-danger'>Invalid Password</div>";
     }
  }else{
    echo "<div class='alert alert-danger'>Invalid Email</div>";
  }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- boostrapt cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
  body{
    background-image:url("img/bg-img-1.jpeg");
    background-repeat:no-repeat;
    background-size:cover;
  }
  #login{
      display:flex;
      justify-content:center;
      align-items:center;
  }
  .container{
    margin-top:120px;
   
  }
  form{
    background:#a9a9a93f;
    padding:40px;
    border-radius:10px;
    color:snow;
  }
  .res_items a{
    text-decoration:none;
    color:blue;
    font-weight:400;
    letter-spacing:1px;
  }
  .res_items a:hover{
    color:#2731db;
    text-decoration: underline ;
  }
 
</style>
<body>
    <div class="container ">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"
                     placeholder="Email">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div id="login">
                <input type="submit" name="submit" class="btn btn-info mb-3" value="Login">
                </div>
                <div class="res_items text-center" >
                   <span class="account">Not have an account?</span>
                   <a href="register.php">Register</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>