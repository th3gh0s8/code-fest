<?php
include './DB_connection.php';

$userId= $_GET['id'];

$sql = "DELETE FROM users WHERE id ='".$userId."'";
$isdeleted= mysqli_query($connection, $sql);
if($isdeleted){
    
    echo 'user deleted successfully';
}else{
    
    echo 'error !';
}

?>

<a href="userManager.php">back</a>