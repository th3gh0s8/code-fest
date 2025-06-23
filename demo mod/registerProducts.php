<?php

include './DB_connection.php';
$name=$_POST["inname"];
$description=$_POST["indescription"];
$category=$_POST["incategory"];
$sellprice=$_POST["sellprice"];
$buyprice=$_POST["buyprice"];
$isactive=$_POST["isactive"];



$sql = "INSERT INTO product(name,description,category,sellPrice,buyPrice,is_active) values('".$name."','".$description."','".$category."','".$sellprice."','".$buyprice."','".$isactive."')";
$issaved= mysqli_query($connection, $sql);
if($issaved){
    
    echo 'user saved successfully';
}else{
    
    echo 'error !'.$connection->error;
}
mysqli_close($connection);
?>
<a href="productManager.php">back</a>
