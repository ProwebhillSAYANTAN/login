<?php
require 'navbar.php';
include "_dbconnect.php";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $uname=$_POST['uname'];
    $password=$_POST['password'];

    //$sql="Select * from users where password='$password'";
    

        $sql="Select * from users where username='$uname'";

        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        $sql2="Select * from users where password='$password'";

        $result2=mysqli_query($conn,$sql2);
        $num1=mysqli_num_rows($result2);

        if($num==1 && $num1==1){
          echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Loggedin.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';


        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$uname;
        header("location:welcome.php");
        }
        else if($num==1 && $num1==0){
          echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Invalid password.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';


        }
        else{
          echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Invalid Cradentials,Please Sign up.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        

      

     
    }
  




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>





<div class="container">
    <h2>Please log in</h2>
<form action="/rik/login/login.php" method="POST">
  <div class="mb-3">
    <label for="uname" class="form-label"></label>
    <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>