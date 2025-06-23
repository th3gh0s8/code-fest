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
        include './actions/header.php';
        ?>

        <div align="center">
            <h2>checkout</h2>
            <form method="POST" action="actions/checkoutAction.php">
            <table border="1">
                
                <b> billing and delivery details</b> 
                <table border="0">
                   
                   
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" value="" /></td>
                        </tr>
                        <tr>
                            <td>address:</td>
                            <td><textarea type="text" name="address">
                                </textarea></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="" /></td>
                        </tr>
                         <tr>
                            <td>username:</td>
                            <td><input type="text" name="username" value="" /></td>
                        </tr>
                         <tr>
                            <td>password:</td>
                            <td><input type="text" name="password" value="" /></td>
                        </tr>
                         <tr>
                            <td>contact number:</td>
                            <td><input type="text" name="contactNumber" value="" /></td>
                        </tr>
                        <tr>
                            <td>city:</td>
                            <td><input type="text" name="city" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="confirm" /></td>
                        </tr>
                   
                </table>

                </form>
                <hr>
                
                <?php
                $totalAmu =0.0;
                $isProduct=false;
                
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $cartItem) {

                        $productQuery = "SELECT * FROM products WHERE id_products = '" . $cartItem[0] . "'";
                        $result = $conn->query($productQuery);
                        
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $rowAmu=($row['sell_price']*$cartItem[1]);
                            $totalAmu=$totalAmu+$rowAmu;
                            $isProduct=true;
                                ?>

                                <tr>
                                    <td><?php echo $cartItem[0];   ?></td>
                                    
                                    <td><?php echo $row["product_name"];   ?></td>
                                    
                                    <td><?php echo $row["sell_price"];   ?></td>
                                    <td><?php echo $cartItem[1]; ?></td>
                                    <td><?php echo $row["sell_price"];   ?> *<?php echo $cartItem[1]; ?></td>
                                   
                                </tr>

                                <?php
                    }
                    
                        }
                        } else {
                            echo 'cart empty';
                        }
                        if (!$isProduct) {
                            echo 'cart empty';
    
}
                        ?>
                    </table>
                    <br>
                    <label>total:<?php echo $totalAmu ;   ?> </label>
                   

                </div>
        <?php
        include './actions/footer.php';
        ?>
    </body>
</html>

