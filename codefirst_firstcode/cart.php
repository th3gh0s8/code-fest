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
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $cartItem) {

                        $productQuery = "SELECT * FROM products WHERE id_products = '" . $cartItem[0] . "'";
                        $result = $conn->query($productQuery);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                                ?>


                        <tr>
                            <td> <?php echo $cartItem[0]; ?></td>

                            <td> <img src="<?php echo "actions/" . $row["product_profile_image"]; ?>" width="90" height="90">
                            </td>

                            <td> <?php echo $row['product_name']; ?></td>

                            <td> <?php echo $row['product_description']; ?></td>



                            <td> <?php echo $row['sell_price'] ?></td>

                            <td> <input type="text" name="product_sell_price" value="product_sell_price"></td>


                            <td> <input type="text" name="product_qty" value="<?php echo $cartItem[1]; ?>"></td>

                            <td> <a href="actions/removeFromCart.php?pid=<?php echo $cartItem[0]; ?>"> <input type="button"  value="Remove"> </a>  </td>


                        </tr>  

                        <?php
                    }
                }
            } else {

                echo 'cart epty';
            }
            ?>

        </table>
        <br>
        <label>Total:</label>
        <input type="submit" value="checkout">


        <?php
        #include './footer.phpfooter.php';
        ?>
    </body>
</html>