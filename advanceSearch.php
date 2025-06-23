
<?php
include './Actions/dbconnection.php';
include './Actions/error_handlling.php';

$keyword = "";
$category = "";



if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

if (isset($_GET['selectedCategory'])) {
    $category = $_GET['selectedCategory'];
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body><?php include'./includs/header.php' ?>

        <div>

            <form action="advanceSearch.php" method="GET">

                <input type="text" name="keyword" value="<?php echo $keyword ?>">


                <select name="selectedCatagory">

                    <option value="">ALL Categorys</option>  <br/>
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
                <input type="submit" value="search"/>
            </form>

        </div>


        <br> 

        <table>
            <?php
            $searchProducts = "SELECT * FROM products p JOIN product_category c ON p.product_category=c.id_product_category AND product_name LIKE '%" . $keyword . "%' ";
            if ($category != "") {
                $searchProducts = $searchProducts . "and p.product_category ='" . $category . "' ";
            }
            $result = $conn->query($searchProducts);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td> <img src="<?php echo "Actions/" . $row["product_profile_image"]; ?>" width="90" height="90">   </td>


                        <td><h1> <?php echo "Name:~" . $row["product_name"]; ?></h1>

                            <p> <?php echo "discription" . $row["product_description"]; ?></p>
                            <p> <?php echo "Category" . $row["category_name"]; ?></p>
                            <p> <?php echo "sell price" . $row["sell_price"]; ?></p>

                        </td>
                        <td><input type="submit" value="Add to cart"></td>
                    </tr>

                    <?php
                }
            }

            $conn->close();
            ?>

        </table>


    </select>




</body>
</html>
