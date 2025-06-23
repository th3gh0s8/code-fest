<?php
session_start()
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
                    $productQuery="SELECT * FROM product WHERE id_products= '".$cartItem[0]."'";

                    if ($resut->query($productQuery)) {
                        $row = $resut->fetch_assoc();
                    
?>

                    <tr>
                    <td> <?php echo $cartItem[0]?></td>

                <td> <img src="#" /></td>

                <td> <?php echo $row['products_name'] ?></td>

                <td> <?php echo $row['products_description'] ?></td>

                <td> <?php echo $row['sell_price'] ?></td>

                <td> <input type="text" name="quty" value="<?php echo $row['cat_item'] ?>">   </td>

                <td> <a href="removeFromCart.php?pid=<?php echo $cartItem[0] ?>"></a> <input type="button"  value="Remove"> </a>  </td>


            </tr>  

            <?php   
            }
        }
            ?>

        </table>
        <br>
        <label>Total:</label>


        <?php
        include './footer.phpfooter.php';
        ?>
</body>
</html>
