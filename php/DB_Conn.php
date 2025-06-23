<?php
$username = "root";
$password ="";
$databaseName = "php_cls";
$HostUrl = "localhost";
$Hostport = "3306";
$connection = new mysqli($HostUrl, $username,  $password,$databaseName, $Hostport);
if($connection->connect_error){
    echo 'Error !, Not Connected.' . $connection->connect_error;
}else{
 //   echo "connected Successfully !";
}