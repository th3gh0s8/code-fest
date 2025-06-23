<?php
session_start();
include './dbconn.php';
$username = "admin";
$password = "1234";
 
if ($username=='admin' && $password=='1234') {
    header("Location:../orders.php?msg=welcome admin");    die();
} else {
    echo 'error';
}
 