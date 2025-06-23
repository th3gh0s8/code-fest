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

                    <tr>
                    <td> <?php echo $row['id_products'];
                    ?></td>

                <td> <?php echo $row['id_products']; ?></td>

                <td> <?php echo $row['id_products']; ?></td>

                <td> <?php echo $row['id_products']; ?></td>

            </tr>     
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
