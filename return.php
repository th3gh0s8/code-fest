<?php
session_start();
include './actions/dbConnection.php';
$orderID = ""; 
if(isset($_GET['order_id'])){$orderID  =$_GET['order_id'];}
if($orderID==""){header("Location: ./cart.php?msg=Cart Requre to process payment");die();}
$user_ID = ""; 
if(isset($_SESSION['userid'])){$user_ID  = $_SESSION['userid'];}
if($user_ID==""){header("Location: ./cart.php?msg=Please Login or Register before Continue");die();}

//have to do this part at notify_url page
   $query = "Update invoice set status = '1' where id_invoice = '".$orderID."'";
         if($conn->query($query)===TRUE){
              echo "<h2>Payment Processed Successfully !</h2>";
              if(isset($_SESSION['cart'])){
                  $_SESSION['cart'] = null;
              $_SESSION['current_invoice_id'] = null;
              }
         }
//notify_url page part completed

 
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/codefest_css.css" type="text/css" />
    </head>
    <body> 
        <?php include './include/header.php'; ?> 
        <input type="button" onclick="window.print()" value="Print" />
        <div align="center">
            <h2>Order Placed Successfully !</h2>
            
            <div width="400">
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
                <br>
                <h2>Product Details</h2>
            </div>
            
            <table>
                <thead>
                <tr>
                    <td></td>
                    <td><h4>Product Name</h4></td>
                    <td><h4>Description</h4></td>
                    <td><h4>Qty</h4></td>
                    <td><h4>Amount</h4></td>
                </tr>
                </thead>
                <tbody>
            <?php
            $productList = "SELECT * FROM invoice i join  invoice_items ii on i.id_invoice = ii.id_invoice
 join products p on ii.id_product = p.id_products
where i.id_invoice = '".$orderID."' ";
            
            $result = $conn->query($productList);
            $total = 0;
            
                if($result->num_rows>0){
       while($row = $result->fetch_assoc()){
           $total =$total + ($row['line_unit_price']*$row['line_qty']);
            ?>
             <tr>
                     
                        <td><img  src="actions/<?php echo $row['product_profile_img'];?>" width="90" height="90" /> </td> 
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['product_description'];?></td> 
                        <td><?php echo $row['line_qty'];?></td> 
                        <td><?php echo ($row['line_unit_price']*$row['line_qty']);?></td>  
                    </tr>    
            <?php
                }
                
       }
            ?>
                </tbody>
            </table>
            <h2>Total : <?php echo $total?></h2>
            
        </div>
        <?php include './include/footer.php'; ?>
    </body>
</html>
