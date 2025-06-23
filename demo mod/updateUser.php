<?php
include './DB_connection.php';

$id=$_POST['id'];
$name=$_POST["name"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];  
$type=$_POST["type"];
$username=$_POST["username"];
$password=$_POST["password"];

//echo $id."<br> ".$name." <br>".$birthday."<br> ".$email."";

$sql="UPDATE users SET name='".$name."',birthday='".$birthday."',email='".$email."',type='".$type."',username='".$username."',password='".$password."' WHERE id='".$id."'";
$isSaved= mysqli_query($connection, $sql);
if($isSaved){
    
    echo 'user update successfully';
}else{
    
    echo 'error !'.$connection->error;
}
mysqli_close($connection);
?>
<a href="userManager.php">back</a>



