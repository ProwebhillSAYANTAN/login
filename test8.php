<?php
include 'db_connect.php';

$sql= "SELECT * FROM `notes` ";
$result=mysqli_query($conn,$sql);

$num=mysqli_num_rows($result);
echo $num;
echo "<br>";

if($num>0){
    $sno=1;
    while($row=mysqli_fetch_assoc($result)){
        echo $sno.  "  This is your   " . $row['title'] . " & this is your " . $row['notes'] . " " ;
        echo "<br>";
        $sno++;
    }
}
?>