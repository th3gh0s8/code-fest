<?php

$url = 'localhost';

$username = 'root';

$password = 'pasindu12236';

$dbName = "codefest_test";

$port = 3307;

$conn = new mysqli($url, $username, $password, $dbName, $port);


if ($conn->connect_error) {
    
    echo 'connection error' . $conn->connect_error . "<br>";
    
} else {

    echo ' connection success <br>';
}


















