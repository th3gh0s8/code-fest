<?php

$username="root";
$password="Hazeem1998*";
$databaseName="inventory";
$hosturl="localhost";
$hostport="3306";

$connection=new mysqli($hosturl, $username, $password, $databaseName, $hostport);

if($connection->connect_error){
    echo 'Error !, Not connected. '. $connection->connect_error;
}else{
    
   
}
?>
