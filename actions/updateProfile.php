<?php
session_start();
include './dbConnection.php';
$is_login = "";
$userid = "";
if(isset($_SESSION['is_login'])){$is_login = $_SESSION['is_login'];}
if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];}
if($is_login!=true){header("Location: login.php?msg= Please Login Again!");die();}
$name = "";
$address = "";
$contactNo = "";
$email = ""; 
$password = "";
                 
if(isset($_POST['name'])){$name = $_POST['name']; }
if(isset($_POST['address'])){$address = $_POST['address']; }
if(isset($_POST['contactNo'])){$contactNo = $_POST['contactNo']; }
if(isset($_POST['email'])){$email = $_POST['email']; }
if(isset($_POST['password'])){$password = $_POST['password']; }

if($name==''){header("Location:../profile.php?msg=Name not Found ! ");die();}
if($address==''){header("Location:../profile.php?msg=Address not Found ! ");die();}
if($contactNo==''){header("Location:../profile.php?msg=Contact No not Found ! ");die();}
if($email==''){header("Location:../profile.php?msg=Email not Found ! ");die();}
if($password==''){header("Location:../profile.php?msg=Password not Found ! ");die();}

$updateProfile = "Update users set name = '".$name."' , address='".$address."', contact_no= '".$contactNo."',email='".
        $email."', password='".$password."' where id_users= '".$userid."' ";

$result = $conn->query($updateProfile);
if($result===TRUE){
    header("Location:../profile.php?msg=Update Success !"); 
           $_SESSION['name'] =$name;
           die();
} else {
    header("Location:../profile.php?msg=Update Failed !");die(); 
}