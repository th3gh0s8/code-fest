<?php
include './actions/dbconnection.php';


$query = "SELECT * FROM product_category";
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
            <h2>product manager</h2>
            <form action="actions/saveproduct.php" method="post" enctype="multipart/form-data">
                <table border="1">

                    <tbody>
                        <tr>
                            <td>Product name</td>
                            <td><input type="text" name="product_name" value="" /></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><input type="text" name="product_desc" value="" /></td>
                        </tr>
                        <tr>
                            <td>Buy price</td>
                            <td><input type="text" name="product_buy_price" value="" /></td>
                        </tr>
                        <tr>
                            <td>Sell price</td>
                            <td><input type="text" name="product_sell_price" value="" /></td>
                        </tr>
                        <tr>
                            <td>qty</td>
                            <td><input type="text" name="product_qty" value="" /></td>
                        </tr>
                        <tr>
                            <td>product image</td>
                            <td><input type="file" name="product_image" value=""></td>
                        </tr>
                        <tr>
                            <td>product category</td>
                            <td><select name="category">

                                    <?php
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                    <option value="<?php echo $row['id_product_category']?>"><?php echo $row  ['category_name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>status</td>
                            <td><select name="status">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" value="save product" /></td>
                        </tr>


                    </tbody>
                </table>

            </form>
        </div>
    </body>
</html>
