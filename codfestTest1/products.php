<?php
include './action/dbconnection.php';



$query = "SELECT * FROM products";
$result = $conn->query($query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div align="center">
              <?php
            if (isset($_GET['msg'])) {
                ?>
            <p style="color: red"><?php echo $_GET['msg']; ?></p>

                <?php
            }
            ?>
           
                <h1></h1>
                <table border="1">
                    <thead>

                        <tr>
                            <th>product id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>buy price</th>
                            <th>sell price</th>
                            <th>qty</th>
                            <th>category</th>
                            <th>image</th>
                            <th>is active</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                        
                         <form action="action/updateproduct.php" method="post">
                                <tr>
                                    <td><?php echo $row["id_products"]; ?></td>
                                    <td><input type="text" name="product_name" value="<?php echo $row["product_name"]; ?>" /></td>
                                    <td><input type="text" name="product_desc" value="<?php echo $row['product_description']; ?>" /></td>
                                    <td><input type="text" name="product_buy_price" value="<?php echo $row["buy_price"]; ?>" /></td>
                                    <td><input type="text" name="product_sell_price" value="<?php echo $row["sell_price"]; ?>" /></td>
                                    <td><input type="text" name="product_qty" value="<?php echo $row["avl_qty"]; ?>" /></td>
                                    <td><select name="category">

                                            <?php
                                            $queryCat = "SELECT * FROM product_category";
                                            $resultCat = $conn->query($queryCat);

                                            if ($resultCat->num_rows > 0) {
                                                while ($rowx = $resultCat->fetch_assoc()) {
                                                    ?>
                                            <option <?php if ($row['product_category'] == $rowx['idproduct_category']){echo 'selected';}?> 
                                                value="<?php echo $rowx['id_product_category'] ?>"><?php echo $rowx ['category_name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select></td>
                                    <td><img src="<?php echo "action/" . $row["product_profile_image"]; ?>" width="70" height="70"></td>
                                    <td><select name="status">
                                            <option <?php
                                            if ($row['is_active'] == 1) {
                                                echo 'selected';
                                            }
                                            ?> value="1">yes</option>
                                            <option <?php
                                            if ($row['is_active'] == 0) {
                                                echo 'selected';
                                            }
                                            ?> value="0">no</option>
                                        </select></td>
                                    <td><input type="hidden" name="productId" value="<?php echo $row['id_products']; ?>" />
                                        <input type="submit" value="update" /></td>
                                    <td><a href="action/deleteproducts.php?id=<?php echo $row['id_products']; ?>">delete</a></td>
                                </tr>
                                 </form>
                                <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>

           
        </div>
    </body>
</html>
