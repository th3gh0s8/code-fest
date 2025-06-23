<?php
session_start();
include './dbconnection.php';
$name="";
$address="";
$city="";
$contactnumber="";
$email="";
$username="";
$password="";
$cart="";

if (isset($_POST['name'])) {
    $name=$_POST['name'];
}
if (isset($_POST['address'])) {
    $address=$_POST['address'];
}
if (isset($_POST['city'])) {
    $city=$_POST['city'];
}
if (isset($_POST['contactNumber'])) {
    $contactnumber=$_POST['contactNumber'];
}
if (isset($_POST['email'])) {
    $email=$_POST['email'];
}
if (isset($_POST['username'])) {
    $username=$_POST['username'];
}
if (isset($_POST['password'])) {
    $password=$_POST['password'];
}
if (isset($_SESSION['cart'])) {
    $cart=$_SESSION['cart'];
}

if ($name=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($address=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($city=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($contactnumber=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($contactnumber=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($email=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($password=="") {
    header("Location:index.php?msg=invalid request to checkout ");    die();
}
if ($cart=="") {
    header("Location:../cart.php?msg=cart not found ");    die();
}

$insertQuery = "INSERT INTO users(name,address,contact_no,email,username,password,userType,is_active)"
        . " VALUES('".$name."','".$address."','".$contactnumber."','".$email."','".$username."','".$password."','2','1')";
                 
$result = $conn->query($insertQuery);
$saved_user_id=0;
if($result===true){
    $saved_user_id=$conn->insert_id;
    
}else {
echo 'error'.mysqli_error($conn);
}
    
    echo 'saved data'.$saved_user_id;
    
    $totalAmu =0.0;
              
                
               
                    foreach ($cart as $cartItem) {

                        $productQuery = "SELECT * FROM products WHERE id_products = '" . $cartItem[0] . "'";
                        $result = $conn->query($productQuery);
                        
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($result->num_rows>0) {
                                $row=$result->fetch_assoc();
                                 $rowAmu=($row['sell_price']*$cartItem[1]);
                            $totalAmu=$totalAmu+$rowAmu;
                            $isProduct=true;
                            
                        
                            }
                           
                        }
                    }

$saveInvoice="INSERT INTO invoice(invoice_date,total_amount,invoiced_to,invoiced_checked_by,status) "
        . "VALUES (now(),'".$totalAmu."','".$saved_user_id."',1,'2')";
echo $saveInvoice;
$resultx=$conn->query($saveInvoice);

if ($resultx===true) {
    echo 'invoice saved successfully';
    $last_id_invoice=$conn->insert_id;
    $_SESSION["current_invoice_id"]=$last_id_invoice;
    echo 'invoice id'.$last_id_invoice;
    
    foreach($cart as $cartItem){
        $querysaveitem="INSERT INTO invoice_items(id_product,id_invoice,line_qty,line_unit_price) "
                . "VALUES ('".$cartItem[0]."','".$last_id_invoice."','".$cartItem[1]."',(SELECET sell_price from products WHERE id_products ='".$cartItem[0]."'))";
        $pitem=$conn->query($querysaveitem);
        if ($pitem===TRUE){
            echo $cartItem[0]."saved ";
        }else{
    echo 'error'. mysqli_error($conn); 
}
    } 
}
header("Location:../paymentconfirmationpage.php");
?>

->