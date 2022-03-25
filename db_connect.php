<?php
$servername="localhost";
$username="root";
$password="";
$database="crud";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failes to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was sucessfull";
    echo "<br>";
}
?>