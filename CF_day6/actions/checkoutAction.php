<?php 
session_start();

include "dbconnection.php";

$name="";
$address="";
$city="";
$contactNo="";

$email="";

$username="";

$password="";


$cart="";


if (isset($_POST['name'])) { $name = $_POST['name'];}

if (isset($_POST['address'])) { $address = $_POST['address'];}

if (isset($_POST['city'])) { $city = $_POST['city'];}

if (isset($_POST['contactno'])) { $contactNo= $_POST['contactno'];}

if (isset($_POST['email'])) { $email= $_POST['email'];}

if (isset($_POST['username'])) { $username= $_POST['username'];}

if (isset($_POST['password'])) { $password= $_POST['password'];}

if (isset($_SESSION['cart'])) { $cart= $_SESSION['cart'];}


if( $name==""||$address==""||$city==""||$contactNo==""||$cart==""){

	header("Location: checkout.php?msg= inncorect Recquest ");

	die();
}



$insQuery="INSERT INTO `users`(`name`,`address`,`contact_no`,`email`,`username`,`password`,`user_type`,`is_active`) VALUES('".$name."','".$address."','".$contactNo."','".$email."','".$username."','".$password."','2','1')";

//echo $insQuery;
    $result= $conn->query($insQuery);

if($result===TRUE){
    echo 'query sucess <br>';

     $result= $conn->query("SELECT id_users FROM users WHERE email='".$email."'");

     $row=$result->fetch_assoc();
     $saved_user_id= $row['id_users'];


     echo "saved_user_id".$saved_user_id;



} else {
    

    echo 'query error <br>'. $conn->error;
}

?>
<html>
<body>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216675">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/return">
    <input type="hidden" name="cancel_url" value="http://localhost/cancel">
    <input type="hidden" name="notify_url" value="http://localhost/notify">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="ItemNo12345">
    <input type="text" name="items" value="Door bell wireless"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="1000">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="<?php echo $name;?>">
    <input type="text" name="last_name" value="Perera"><br>
    <input type="text" name="email" value="<?php echo $email;?>">
    <input type="text" name="phone" value="<?php echo $contactNo;?>"><br>
    <input type="text" name="address" value="<?php echo $address;?>">
    <input type="text" name="city" value="<?php echo $city;?>">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form> 
</body>
</html>