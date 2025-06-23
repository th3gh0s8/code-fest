<?php
session_start();
include './dbConnection.php';

$is_login = "";
$userid = "";
if(isset($_SESSION['is_login'])){$is_login = $_SESSION['is_login'];}
if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];}

if($is_login!=true){header("Location: login.php?msg= Please Login Again!");die();}

$query = "update users set is_active = '0' where id_users = '".$userid."' ";
$result = $conn->query($query);

if($result===TRUE){
    header("Location: ./logout.php");die();
}else{
    header("Location: ../profile.php?msg=Account Deactivation Failed.");die();
}