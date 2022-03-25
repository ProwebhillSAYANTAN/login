<?php
$servername="localhost";
$username="root";
$password="";
$database="users";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect with database due to " . mysqli_connect_error($conn));
}
?>