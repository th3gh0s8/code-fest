<?php

include './DB_connection.php';
$amount=$_POST["inamount"];
$date=$_POST["indate"];
$createdby=$_POST["increate"];
$processby=$_POST["inprocess"];
$paid=$_POST["ispaid"];
$status=$_POST["instatus"];



$sql = "INSERT INTO invoice(amount,d,category,sellPrice,buyPrice,is_active) values('".$name."','".$description."','".$category."','".$sellprice."','".$buyprice."','".$isactive."')";
$issaved= mysqli_query($connection, $sql);
if($issaved){
    
    echo 'user saved successfully';
}else{
    
    echo 'error !'.$connection->error;
}
mysqli_close($connection);
?>
<a href="productManager.php">back</a>
