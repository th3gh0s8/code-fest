<?php
include './DB_connection.php';

$id=$_POST['id'];
$name=$_POST["name"];
$description=$_POST["description"];
$category=$_POST["category"];
$sellprice=$_POST["sellprice"];
$buyprice=$_POST["buyprice"];
$isactive=$_POST["isactive"];

//echo $id."<br> ".$name." <br>".$birthday."<br> ".$email."";

$sql="UPDATE users SET name='".$name."',description='".$description."',category='".$category."',sellPrice='".$sellprice."',buyPrice='".$buyprice."',is_active='".$isactive."' WHERE id='".$id."'";
$isSaved= mysqli_query($connection, $sql);
if($isSaved){
    
    echo 'user update successfully';
}else{
    
    echo 'error !'.$connection->error;
}
mysqli_close($connection);
?>
<a href="productManager.php">back</a>



