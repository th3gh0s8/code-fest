<?php
include './actions/dbconnection.php';
$keyword = "";
$category = "";


if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['selectedCategory'])) {
    $category = $_GET['selectedCategory'];
}





//$query = "SELECT * FROM product_category";
//$result = $conn->query($query);
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
        <div align="center">
            <form method="get" action="advancedSearch.php">
                <input type="text" name="keyword" value="<?php echo $keyword;?>" />
                <select name="selectedCategory">
                    <option  value="">all categories</option><br>
                  
                    <?php
                    $queryCat = "SELECT * FROM product_category";
                    $resultCat = $conn->query($queryCat);
                    if ($resultCat->num_rows > 0) {
                        while ($row = $resultCat->fetch_assoc()) {
                            ?>
                            <option  <?php if ($category == $row['id_product_category']) {
                        echo 'selected';
                    } ?>  value="<?php echo $row['id_product_category'] ?>"><?php echo $row ['category_name'] ?></option>

                            <?php
                        }
                    }
                    ?>

                </select>
                <input type="submit" value="search" />
            </form>
        </div>
        <br>
        <table style="background-color: activeborder" border="0">
            <?php
            $searchProducts = "SELECT * FROM products p JOIN product_category c ON p.product_category=c.id_product_category AND product_name LIKE '%".$keyword."%' ";
            if ($category != "") {
                $searchProducts = $searchProducts . "and p.product_category ='".$category."' ";
            }
            $result = $conn->query($searchProducts);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><img src="<?php echo "actions/" . $row["product_profile_image"]; ?>" width="90" height="90"></td>
                        <td><h5><?php echo "Name:- ". $row["product_name"]; ?></h5>
                            <p><?php echo "Description:- ". $row['product_description']; ?></p>
                            <p><?php echo "Category:- ". $row["category_name"]; ?></p>
                            <p><?php echo "Sell price:- ". $row["sell_price"]; ?></p>
                            
                        </td>
                        <td>
                        <a href="viweproductdetails.php?pid=<?php echo $row['id_products']?>"><input type="button" value="view Details" /></a>
                        <input type="submit" value="Add to cart" /></td>
                    </tr>
                    <?php
                }
            }
            $conn->close();
            ?>

        </table>
 <?php 
        include './footer.php';
        ?>
    </body>
</html>
