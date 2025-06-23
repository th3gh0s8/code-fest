<?php
session_start();
include './dbConnection.php';
$name = "";
$address = "";
$city="";
$contactNo = "";
$email = "";
$username = "";
$password = "";
$cart = "";


$user_ID = "";
if (isset($_SESSION['userid'])) {
    $user_ID = $_SESSION['userid'];
}

$is_login = false;
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}
$last_id_invoice = "";
if (isset($_SESSION['current_invoice_id'])) {
    $last_id_invoice = $_SESSION['current_invoice_id'];
}



if(isset($_POST['name'])){$name = $_POST['name'];}
if(isset($_POST['address'])){$address = $_POST['address'];}
if(isset($_POST['city'])){$city = $_POST['city'];}
if(isset($_POST['contactNumber'])){$contactNo = $_POST['contactNumber'];}
if(isset($_POST['email'])){$email = $_POST['email'];}

if(isset($_POST['username'])){$username = $_POST['username'];}
if(isset($_POST['password'])){$password = $_POST['password'];}

//cart data
if(isset($_SESSION['cart'])){$cart = $_SESSION['cart'];}

    if($cart==''){header("Location:../cart.php?msg=Cart not found !");die();}

 
    if(!$is_login){
    ///register new user part not require for registerd and logged in users !
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
('".$name."','".$address."','".$contactNo."',
'".$email."',
'".$username."',
'".$password."',
'2',
'1')";
// echo $insertQuery;
 $result = $conn->query($insertQuery); 
 
   $user_ID =0;
   if($result===TRUE){
      $user_ID =  $conn->insert_id;
       $_SESSION["userid"] = $user_ID;
   }else{
       echo "ERROR ".mysqli_error($conn);
   }
  }
   
   
    if($last_id_invoice!=""){
        //remove previous temp carts
        $dropCartQuery = "delete from invoice_items  where id_invoice = '".$last_id_invoice."' ";

$res = $conn->query($dropCartQuery);
    }
       $totalAmu = 0.0; 
               
  if($last_id_invoice==""){
   $saveInvoice = "insert into "
           . "invoice(invoice_date,total_amount,invoiced_to,invoiced_checkd_by,status) values"
           . "(now(),'".$totalAmu."','".$user_ID."',null,'2')";   
   
//   echo $saveInvoice;
   $resultx = $conn->query($saveInvoice);
       echo "invoice saved Successfully !";
     $last_id_invoice = $conn->insert_id;
     $_SESSION["current_invoice_id"] = $last_id_invoice;     
       echo "Invoice ID : ".$last_id_invoice; 
  }
       
       
       
       //save all the items !!!
           foreach ($cart as $cartItem){
               $querySaveItem = "insert into invoice_items(id_product,id_invoice,line_qty,line_unit_price)"
              . " values('".$cartItem[0]."', '".$last_id_invoice."', '".$cartItem[1].
                       "',(select sell_price from products where id_products ='".$cartItem[0]."' ) )"; 
              $pitem = $conn->query($querySaveItem);
              if($pitem===true){
                  echo $cartItem[0]." saved success";
               }else{
                   echo "error".mysqli_error($conn);
                   }      
   } 
   
   
             $updateInvoiceTotal = "update invoice i set i.total_amount = (select sum(ii.line_unit_price*ii.line_qty) from 
invoice_items ii where ii.id_invoice = i.id_invoice) where i.id_invoice =  '".$last_id_invoice."' ";
   
              if($conn->query($updateInvoiceTotal)===true){
                  echo " invoice total updated successfully !";
               }else{
                   echo "error".mysqli_error($conn);
                   }      
     
               
               //payment Confirmation page
               header("Location: ../paymentConfirmationPage.php");
   
   ?>