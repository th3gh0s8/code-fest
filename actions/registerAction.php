<?php
include './dbConnection.php';

 $name = "";
 $address = "";
 $contactNo = "";
 $email = "";
 $username = "";
 $password = "";
 $retypePassword = "";
  
 if(isset($_POST['name'])){$name = $_POST['name'];}
 if(isset($_POST['address'])){$address = $_POST['address'];}
 if(isset($_POST['contactno'])){$contactNo = $_POST['contactno'];}
 if(isset($_POST['email'])){$email = $_POST['email'];}
 if(isset($_POST['username'])){$username = $_POST['username'];}
 if(isset($_POST['password'])){$password = $_POST['password'];}
 if(isset($_POST['retypePassword'])){$retypePassword = $_POST['retypePassword'];}

 //validation 
    if($name==''){       header("Location:../register.php?msg=Name not Found ! ");die();}
    if($address==''){    header("Location:../register.php?msg=Address not Found ! ");die();}
    if($contactNo==''){  header("Location:../register.php?msg=Contact No not Found ! ");die();}
    if($email==''){      header("Location:../register.php?msg=Email not Found ! ");die();}
    if($password==''){   header("Location:../register.php?msg=password not Found ! ");die();}
    if($retypePassword==''){ header("Location:../register.php?msg=Re type password not Found ! ");die();}
    if($password!=$retypePassword){  header("Location:../register.php?msg=Password Re-type Incorrect ! ");die();}
 
 $insertQuery = "INSERT INTO `users`
(
`name`,
`address`,
`contact_no`,
`email`,
`username`,
`password`,
`user_type`,
`is_active`)
VALUES
(
'".$name."',
'".$address."',
'".$contactNo."',
'".$email."',
'".$username."',
'".$password."',
'2',
'1')";
 
 $result = $conn->query($insertQuery);
 if($result===TRUE){
 header("Location: ../login.php?msg= Registered Successfully !");die();
 }else{
     echo '<h2>Error ! '.$conn->error."<h2>"; 
 header("Location: ../register.php?msg=Error : ".$conn->error);die();
 }
 
 
// echo "<br>";
// 
// echo "Name : ".$name."<br>";
// echo "Address : ". $address."<br>";
// echo "Contact Number : ".$contactNo."<br>";
// echo "Email "  .$email."<br>";
// echo "Username : ".$username."<br>";
// echo "Password : ".$password."<br>";