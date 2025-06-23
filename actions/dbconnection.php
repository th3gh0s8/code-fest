<?php
$username ="root";
$password ="pasindu12236";
$database ="codefest_test";
$host ="localhost";
$port = "3307";

$conn= new mysqli($host,$username,$password,$database,$port);

if ($conn->connect_error) {
    echo 'error'.$conn->connect_error;
}else{
    echo 'connected';
}
