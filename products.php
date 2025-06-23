<?php
include './actions/dbConnection.php'; 
$query = "select * from products"; 
        $result = $conn->query($query);
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product manager</title>
    </head>
    <body>
        <div align="center">
            <table border="0">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Buy Price</th>
                        <th>Sell Price</th>
                        <th>Qty</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Is Active</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                      
                </thead>
                <tbody>
                    <?php
                if($result->num_rows > 0){
                      while ($row = $result->fetch_assoc()) {
                    ?>
                <form method="post" action="actions/updateProduct.php" >
                    <tr>
                        <td><?php echo $row['id_products'];?></td>
                        <td><input type="text" name="product_name" value="<?php echo $row['product_name'];?>"></td>
                        <td><input type="text" name="product_desc" value="<?php echo $row['product_description'];?>"></td>
                        <td><input type="text" name="product_buy_price" value="<?php echo $row['buy_price'];?>"></td>
                        <td><input type="text" name="product_sell_price" value="<?php echo $row['sell_price'];?>"></td> 
                        <td><input type="text" name="qty" value="<?php echo $row['avl_qty'];?>"></td>
                        <td><select name="category">
                                <?php
                                     
$queryCat = "select * from product_category"; 
        $resultCat = $conn->query($queryCat); 
                                if($resultCat->num_rows > 0){
                                    while ($rowx = $resultCat->fetch_assoc()) {
                                ?>
  <option <?php if($row['product_category']==$rowx['id_product_category']){echo "selected";} ?> 
      value="<?php echo $rowx['id_product_category'];?>"><?php echo $rowx['category_name'];?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select></td>
                        <td><img src="<?php echo "actions/".$row['product_profile_img'];?>" width="70" height="70"></td>
                                <td><select name="productstatus">
                                        <option  <?php if($row['is_active']==1){echo "selected";}?>  value="1">Yes</option>
                                        <option  <?php if($row['is_active']==0){echo "selected";}?> value="0">No</option>
                                        <a href="actions/deleteProduct.php"></a>
                            </select></td>
                        <td>
                            <input type="hidden" name="productId" value="<?php echo $row['id_products'];?>" /> 
                            <input type="submit" value="Update" /></td>
                        <td><a href="actions/deleteProduct.php?id=<?php echo $row['id_products'];?>">Delete</a></td>
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
