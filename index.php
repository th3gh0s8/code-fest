<?php
include './actions/dbConnection.php';
$query = "select * from product_category";
$result = $conn->query($query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
    <?php
    include './include/header.php';
    ?>
        <div align="center"><form method="GET" action="AdvancedSearch.php">
                <input type="text" name="keyword" />
                <select name="selectedCategory">
                    <option value="">All Categories</option>
                    
                    <?php
                    if($result->num_rows>0){
                        while ($row = $result->fetch_assoc()){
                     ?>
                    <option value="<?php echo $row['id_product_category']?>">
                        <?php echo $row['category_name']?></option>
                    <?php
                        }
                    }?>
                </select>
            <input type="submit" value="Search" />
            </form> 
            <img src="images/codefest.png" height="500" width="400" />
        </div> 
        <?php include './include/footer.php';?>
    </body>
</html>
