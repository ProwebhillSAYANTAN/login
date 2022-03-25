<?php
require 'navbar.php';
include "_dbconnect.php";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
  $existsql="SELECT * FROM `users`  WHERE username='$uname';";

  $result=mysqli_query($conn,$existsql);
  $num=mysqli_num_rows($result);

  

  if($num>0){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Username Already Exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  else{
    if($password==$cpassword){
      $sql="INSERT INTO `users` ( `username`, `password`, `cpassword`, `date`) VALUES ( '$uname', '$password', '$cpassword', current_timestamp())";

      $result=mysqli_query($conn,$sql);


      if($result){
          echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> signup successfull.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      else{
          echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> signup not successfull successfull.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }

   
  }
  else{
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Password does not match.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
  }
  
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
    <h2>Sign up to our website</h2>
<form action="/rik/login/signup.php" method="POST">
  <div class="mb-3">
    <label for="uname" class="form-label"></label>
    <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Please Write the same password</div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>