<?php
session_start();
include './actions/dbConnection.php';
$orderID = ""; 
if(isset($_SESSION['current_invoice_id'])){$orderID  = $_SESSION['current_invoice_id'];}
if($orderID==""){header("Location: ./cart.php?msg=Cart Requre to process payment");die();}

$user_ID = ""; 
if(isset($_SESSION['userid'])){$user_ID  = $_SESSION['userid'];}
if($user_ID==""){header("Location: ./cart.php?msg=Please Login or Register before Continue");die();}
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link href="css/codefest_css.css" type="text/css" rel="stylesheet"/> 
    </head>
    <body>
        <?php include './include/header.php'; ?>
        
        <div align="center">
                 <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
 
            <h2>Order Confirmation Page</h2><br>
            <table>
                <tr>
                    <td>
          <input type="hidden" name="merchant_id" value="1216675"> 
          <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/Code_Fest_Day_08/return.php">
    <input type="hidden" name="cancel_url" value="http://localhost/Code_Fest_Day_08/cancel.php">
    <input type="hidden" name="notify_url" value="http://localhost/Code_Fest_Day_08/notify_url.php">  
   
    <input type="hidden" name="order_id" value="<?php echo $orderID;?>">  
   
     
     
        <h2>Order Details </h2>
        <?php
    $paymentItems="";
        $items = "select * from invoice_items i join products p on  "
                . " i.id_product = p.id_products "
                . "where i.id_invoice = '".$orderID."'";
        $result = $conn->query($items); 
        
        $total=0;
        if($result->num_rows>0){
       while($row = $result->fetch_assoc()){
       ?>
        <label>Item Name : <?php 
        $total = $total + ($row['line_unit_price']*$row['line_qty']);
        $paymentItems = $paymentItems.", ".$row['product_name'].":".$row['line_qty'];
        echo $row['product_name']?></label><br>
    <?php 
       }
        }?>
      
        <label>Currency  : LKR</label><br>
        <label>Amount    : <?php echo $total;?></label><br>
        
        <input type="hidden" name="items" value="<?php echo $paymentItems;?>"><br> 
         <input type="hidden" name="currency" value="LKR">
         <input type="hidden" name="amount"  value="<?php echo $total;?>">  </td>
         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <h2>Customer Details</h2>
    
    <?php 
            $query2 = "select * from users where id_users = '".$user_ID."'";
            $resultUser = $conn->query($query2);
           $record = $resultUser->fetch_assoc();
    ?>
    
    <table border="0"> 
            <tr>
                <td>Order Id : </td>
                <td><?php echo $orderID;?></td>
            </tr>
            <tr>
                <td>Customer Name : </td>
                <td><?php echo $record['name']?></td>
            </tr>
            <tr>
                <td>Customer Email: </td>
                <td><?php echo $record['email']?></td>
            </tr>
            <tr>
                <td>Contact Number: </td>
                <td><?php echo $record['contact_no']?></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><?php echo $record['address']?></td>
            </tr>
            <tr>
                <td>Country : </td>
                <td>Sri Lanka</td>
            </tr>
           
    </table> </td>
                    </tr></table>
            
  
    <input type="hidden" name="first_name" value="<?php echo $record['name']?>">
    <input type="hidden" name="last_name" value="chandra">
    <input type="hidden" name="email" value="<?php echo $record['email']?>">
    <input type="hidden" name="phone" value="<?php echo $record['contact_no']?>">
    <input type="hidden" name="address" value="<?php echo $record['address']?>">
    <input type="hidden" name="city" value="Colombo"><br> 
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Payment">   
</form>
        </div>
    </body>
</html>
