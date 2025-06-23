<?php

include './dbconn.php';

$mobile="";
$email="";
$address="";
$name="";


if (isset($_POST['mobile'])) { $mobile = $_POST['mobile'];}
if (isset($_POST['email'])) { $email = $_POST['email'];}
if (isset($_POST['name'])) { $name = $_POST['name'];}
if (isset($_POST['address'])) { $address = $_POST['address'];}


if ($mobile === '') {header("Location:../index.php?msg=mobile not found");die();}
if ($email === '') {header("Location:../index.php?msg=email not found");die();}
if ($name === '') {header("Location:../index.php?msg=name not found");die();}
if ($address === '') {header("Location:../index.php?msg=address not found");die();}

//image uplaoder here !!!
$target_dir = "presImages/";
$target_file = $target_dir . basename($_FILES["pres_image"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
&& $FileType != "gif" ) {
   $uploadOk = 0;
}

if ($uploadOk == 0) {
   header("Location: ../index.php?msg=Sorry,only JPG, JPEG, PNG & GIF files are allowed."); 
  die();
} else {
  move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
}

  
  $Query="INSERT INTO orders(mobile,email,name,address,presImg,note) VALUES"
        . "('".$mobile."','".$email."','".$name."','".$address."','".$target_file."','note here')";
  $result=$conn->query($Query);
if ($result===TRUE){
    echo 'done';
    header("Location:../index.php?msg=order placed successfully");die();
} else {
    echo 'error';
   header("Location:../index.php?msg=order placed fail failed");
echo mysqli_error($conn);die();
}