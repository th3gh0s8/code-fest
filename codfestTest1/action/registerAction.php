<?php


 include './dbconnection.php';
 include './error_handlling.php';


$name="";

$address="";

$contactNO="";

$email="";

$username="";

$password="";

$retypePassword="";

if (isset($_POST["name"])) {$name=$_POST["name"];}

if (isset($_POST["address"])) {$address=$_POST["address"];}

if (isset($_POST["contact_no"])) {$contactNO=$_POST["contact_no"];}

if (isset($_POST["email"])) {$email=$_POST["email"];}   

if (isset($_POST["username"])) {$username=$_POST["username"];}

if (isset($_POST["password"])) {$password=$_POST["password"];}

if (isset($_POST["retypepassword"])) {$retypePassword=$_POST["retypepassword"];}


if ($name=="") {header("Location: ../register.php?msg=name not found !");die();}

if ($address=="") {header("Location: ../register.php?msg=address not found !");die();}

if ($contactNO=="") {header("Location: ../register.php?msg=contacts not found !");die();}

if ($email=="") {header("Location: ../register.php?msg=email not found !");die();}

if ($username=="") {header("Location: ../register.php?msg=username not found !");die();}

if ($password=="") {header("Location: ../register.php?msg=password not found !");die();}

if ($retypePassword=="") { header("Location: ../register.php?msg=retype not found !");die();}

if ($password!=$retypePassword) { header("Location: ../register.php?msg=password doesn't match !");die();}





$insQuery="INSERT INTO `users`(`name`,`address`,`contact_no`,`email`,`username`,`password`,`user_type`,`is_active`) VALUES('".$name."','".$address."','".$contactNO."','".$email."','".$username."','".$password."','2','1')";

//echo $insQuery;
    $result= $conn->query($insQuery);

if($result===TRUE){
    echo 'query sucess <br>';

} else {
    

    echo 'query error <br>'. $conn->error;
}

