<?php
session_start();
include './dbconnection.php';
$is_login = "";
$userid = "";
if (isset($_SESSION['is_login'])) {$is_login = $_SESSION['is_login'];}
if (isset($_SESSION['userid'])) {$userid = $_SESSION['userid'];}

if ($is_login!= true) {header("Location:login.php?msg=please login again");die();}

$name = "";
$address = "";
$contactNo = "";
$email = "";
$password = "";

if (isset($_POST['name'])) { $name = $_POST['name'];}
if (isset($_POST['address'])) { $address = $_POST['address'];}
if (isset($_POST['contactNo'])) { $contactNo = $_POST['contactNo'];}
if (isset($_POST['email'])) { $email = $_POST['email'];}
if (isset($_POST['password'])) { $password = $_POST['password'];}

if ($name === '') {header("Location:../profile.php?msg=name not found");die();}
if ($address === '') {header("Location:../profile.php?msg=address not found");die();}
if ($contactNo === '') {header("Location:../profile.php?msg=contact_no not found");die();}
if ($email === '') {header("Location:../profile.php?msg=email not found");die();}
if ($password === '') {header("Location:../profile.php?msg=password not found");die();}

$updateUser="UPDATE users SET name='".$name."',address='".$address."',contact_no='".$contactNo."',email='".$email."',password='".$password."' WHERE id_users ='".$userid."'";
$result=$conn->query($updateUser);

if($result===true){
    header("Location:../profile.php?msg=updated");die(); 
    $_SESSION['name']=$name;die();
} else {
   header("Location:../profile.php?msg=update failed");
    
   die(); 
}




?>