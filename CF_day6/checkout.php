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
            <b>Billing & Delivery Details</b>

            <form method="post" action="actions/checkoutAction.php">
            <table>
                <tr>
                    <td>Name</td>

                    <td><input type="text" name="name"></td>
                </tr>

       <tr>
                    <td>email</td>

                    <td><input type="text" name="email"></td>
                </tr> 
       <tr>
                    <td>user name</td>

                    <td><input type="text" name="username"></td>
                </tr> 
       <tr>
                    <td>password</td>

                    <td><input type="text" name="password"></td>
                </tr> 



                <tr>
                    <td>Address</td>

                    <td><textarea type="text" name="address"></textarea></td>
                </tr> 
                <tr>
                    <td>Contact Number</td>

                    <td><input type="text" name="contactno"></td>
                </tr> 

                <td>City</td>

                <td><input type="text" name="city"></td>
                </tr> 
                <tr>
                    <td></td>

                    <td><input type="submit" value="Update Billing Details" ></td>
                </tr> 




            </table>


        </form>



        <hr>

        <?php
        $totalAmou = 0.0;

        $isProduct = FALSE;

        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach ($cart as $cartItem) {

                $productQuery = "SELECT * FROM products WHERE id_products = '" . $cartItem[0] . "'";
                $result = $conn->query($productQuery);




                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();


                    $rowamu = ($row['sell_price'] * $cartItem['1'] );


                    $totalAmou = $totalAmou + $rowamu;

                    $isProduct = TRUE;
                    ?>


                    <tr>
                        <td> <?php echo $cartItem[0]; ?></td>



                        <td> <?php echo $row['product_name']; ?></td>





                        <td> <?php echo $row['sell_price'] ?></td>


                        <td> <?php echo $cartItem['1'] ?></td>


                        <td> <?php echo ($rowamu); ?></td>

           

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
    <!--<a href="checkout.php"><input type="submit" value="checkout"></a>
    -->

    <?php
#include './footer.phpfooter.php';
    ?>
</body>
</html>