<?php

$servername="localhost";
$username="root";
$password="";
$database="contact";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failes to connect: ". mysqli_connect_error());
}
else{
$sql= "SELECT * FROM `trip` ";
$result=mysqli_query($conn,$sql);

$num=mysqli_num_rows($result);
echo $num;
echo "<br>";

if($num>0){
    $sno=1;
    while($row=mysqli_fetch_assoc($result)){
        echo $sno. "  Hello  ". $row['Name']. "  Welcome to  " . $row['Address'] . "  at  " . $row['Date'] . "  time" ;
        echo "<br>";
        $sno++;
    }
}


$sql="UPDATE `trip` SET `Address` = 'Kolkata' WHERE `Address` = 'Bolpur'";
$result=mysqli_query($conn,$sql);

$aff=mysqli_affected_rows($conn);

if($aff!=0){
    echo "We updated successfully";
}
else{
    "Already Updated";
}




}
?>