<?php

include './DB_connection.php';
$name=$_POST["inname"];
$birthday=$_POST["inbirthday"];
$email=$_POST["inemail"];
$type=$_POST["intype"];
$username=$_POST["inusername"];
$password1=$_POST["inpassword"];



$sql = "INSERT INTO users(name,birthday,email,type,username,password) values('".$name."','".$birthday."','".$email."','".$type."','".$username."','".$password1."')";
$issaved= mysqli_query($connection, $sql);
if($issaved){
    
    echo 'user saved successfully';
}else{
    
    echo 'error !'.$connection->error;
}
mysqli_close($connection);
?>
<a href="userManager.php">back</a>
