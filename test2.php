<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// connecting to the database

$servername="localhost";
$username="root";
$password="";
$database="";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failes to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was sucessfull";
    echo "<br>";
}

//creating a database
$sql= "CREATE TABLE `trip` (  INT(11) NOT NULL AUTO_INCREMENT , `Name` VARCHAR(20) NOT NULL , `Number` INT(10) NOT NULL , `Address` VARCHAR(50) NOT NULL , PRIMARY KEY (`sno`)) ENGINE = I";
$result=mysqli_query($conn,$sql); 


if($result){
    echo"Your database is created successfully";
}
else{
    echo "Your database is not created because---->".mysqli_error($conn);
}



?>

<input type="text"id="name">
</body>
</html>