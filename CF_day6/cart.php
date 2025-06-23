<?php
session_start();

include './actions/dbconnection.php';

?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include './header.php';
        ?>


        <h2>Shopping Cart</h2>


        <table>

            <?php

            $totalAmou=0.0;

            $isProduct=FALSE;

                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $cartItem) {

                        $productQuery = "SELECT * FROM products WHERE id_products = '" . $cartItem[0] . "'";
                        $result = $conn->query($productQuery);


                        

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();


                            $rowamu=($row['sell_price']*$cartItem['1'] );


                            $totalAmou= $totalAmou+$rowamu;

                            $isProduct=TRUE;
                                ?>


                        <tr>
                            <td> <?php echo $cartItem[0]; ?></td>

                            <td> <img src="<?php echo "actions/" . $row["product_profile_image"]; ?>" width="90" height="90">
                            </td>

                            <td> <?php echo $row['product_name']; ?></td>

                            <td> <?php echo $row['product_description']; ?></td>



                            <td> <?php echo $row['sell_price'] ?></td>


                            <td> <?php echo $cartItem['1'] ?></td>


                            <td> <?php echo ($rowamu) ;?></td>

                           <!-- <td> <input type="text" name="product_sell_price" value="product_sell_price"></td>-->


                            <td> <input type="text" name="product_qty" value="<?php echo $cartItem[1]; ?>"></td>

                            <td> <a href="actions/removeFromCart.php?pid=<?php echo $cartItem[0]; ?>"> <input type="button"  value="Remove"> </a>  </td>


                        </tr>  

                        <?php
                    }
                }
            } 

            if (!$isProduct) {
                echo "cart empty";
            }
            ?>

        </table>
        <br>
        <label>Total: <?php echo $totalAmou ?></label>
        <a href="checkout.php"><input type="submit" value="checkout"></a>


        <?php
        #include './footer.phpfooter.php';
        ?>
    </body>
</html>