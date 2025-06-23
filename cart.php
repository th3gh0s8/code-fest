<?php
session_start();
include './actions/dbConnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link href="css/codefest_css.css" type="text/css" rel="stylesheet"/> 
    </head>
    <body>
        <?php include './include/header.php';?>
        <div align="center"> 
            <h2>Shopping Cart</h2> 
            <table border="1"> 
                     <?php
                  $totalAmu = 0.0;
                  $isProduct = false;
                 if(isset($_SESSION['cart'])){
                     $cart = $_SESSION['cart'];
                     foreach ($cart as $cartItem){
                   $productQuery = "select * from products where id_products = '".$cartItem[0]."' ";
                   $result = $conn->query($productQuery);
                   if($result->num_rows>0){
                       $row = $result->fetch_assoc();
                     $rowamu =  ($row['sell_price']*$cartItem[1]);
                     $totalAmu = $totalAmu + $rowamu;
                     $isProduct = TRUE;
                     ?>
                    <tr>
                        <td><?php echo $cartItem[0];?></td>
                        <td><img  src="actions/<?php echo $row['product_profile_img'];?>" width="90" height="90" /> </td> 
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['product_description'];?></td> 
                        <td><?php echo $row['sell_price'];?></td> 
                        <td><?php echo $cartItem[1];?></td> 
                         <td><?php echo ($rowamu);?></td> 
                        <td><a href="actions/removeFromCart.php?pid=<?php echo $cartItem[0];?>">
                                <input type="button"  value="Remove"></a></td> 
                    </tr>       <?php
                   }
                   }} 
                   if(!$isProduct){echo 'cart Empty';}
                   
                   ?>
            </table>
            <br>
            <label>Total : <?php echo $totalAmu?></label>
            <a href="checkout.php"><input type="button" name="Checkout" value="Checkout"></a>
            
        </div>
        <?php include './include/footer.php';?>
        </body>
</html>
