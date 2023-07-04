<?php
if(isset($_POST['save'])){
    $conn = mysqli_connect("localhost","root","","users")or die("connection failed");

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $con_password=$_POST['con_password'];

    $query = "SELECT * FROM user_info WHERE email ='{$email}' ";
    $result = mysqli_query($conn,$query)or die("query failed");

    if(mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-danger'>Email already exists</div>";
    }else{
       if($password === $con_password){
         $pass = md5($password);
        $query2="INSERT INTO user_info(username,email,passwords)
                 VALUES('{$username}','{$email}','{$pass}')";
        if(mysqli_query($conn,$query2)){
            echo "<div class='alert alert-danger'>Hello $username you have registered successfuly</div>";
        }else{
          echo "error";
        }       
       }else{
      echo "<div class='alert alert-danger'>Password and Confirm Password are not match</div>";
       }
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
  #register{
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
  .log_items a{
    text-decoration:none;
    color:blue;
    font-weight:600;
    letter-spacing:1px;
  }
  .log_items a:hover{
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
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control"
                     placeholder="name">
                </div>    
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"
                     placeholder="Email">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <label for="">Confirm Password</label>
                    <input type="password" name="con_password" class="form-control" placeholder="Confirm Password">
                </div>
                <div id="register">
                <input type="submit" name="save" class="btn btn-info mb-3" value="Register">
                </div>
                <div class="log_items text-center" >
                   <span class="account">Have you an account?</span>
                   <a href="index.php">Login</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>