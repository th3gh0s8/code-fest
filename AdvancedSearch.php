<?php
include './actions/dbConnection.php';
$keyword = "";
$category="";
$pFrom="";
$pTo="";

if(isset($_GET['keyword'])){$keyword = $_GET['keyword'];}
if(isset($_GET['selectedCategory'])){$category = $_GET['selectedCategory'];}
if(isset($_GET['pFrom'])){$pFrom = $_GET['pFrom'];}
if(isset($_GET['pTo'])){$pTo = $_GET['pTo'];} 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" type="text/css" rel="stylesheet"/> 
    </head>
    <body> <?php
    include './include/header.php';
    ?>
        <div align="center" style="height: 500" ><form method="GET" action="AdvancedSearch.php">
                <input type="text" name="keyword" value="<?php echo $keyword;?>" /> 
                <select name="selectedCategory"> 
                    <option value="">ALL Categories</option>
                    <?php
                    $queryCat = "select * from product_category";
                    $resultCat = $conn->query($queryCat);
                    if($resultCat->num_rows>0){
                        while ($row = $resultCat->fetch_assoc()){
                     ?>
         <option <?php if($category==$row['id_product_category']){echo "selected";}?> value="<?php echo $row['id_product_category']?>">
                        <?php echo $row['category_name']?></option>
                    <?php
                        }
                    }?>
                </select>
                   <br>
                   Price From:<input type="number" size="5" name="pFrom" value="<?php echo $pFrom?>" />
                    Price To:<input type="number"  size="5" name="pTo" value="<?php echo $pTo?>" />
            <input type="submit" value="Search" />
            </form>
            <br>
            <table border="0">  
                <?php
      $searchProducts = "SELECT * FROM products p "
              . " join product_category c on p.product_category =  c.id_product_category "
              . " where  product_name like '%".$keyword."%' ";
                //if cat searc
                if($category!=""){$searchProducts = $searchProducts. " and  p.product_category = '".$category."'"; }
      
                //if price search
       if($pFrom!="" && $pTo!=""){$searchProducts = $searchProducts. " and  p.sell_price between '".$pFrom."' and '".$pTo."' "; }

        $searchProducts = $searchProducts." order by p.id_products desc";   
                 $result = $conn->query($searchProducts);
                if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()){
                ?>
                <tr style="background-color: aquamarine">
                        <td><img  src="<?php echo "actions/".$row['product_profile_img'];?>" width="90" height="90" /> </td>
                        <td><h5><?php echo "Name:".$row['product_name'];?></h5>
                            <p><?php echo "Description: ".$row['product_description'];?></p>
                            <p><?php echo "Category: ".$row['category_name'];?></p>
                            <p><?php echo "Price: ".$row['sell_price'];?></p>
                            </td>
                            <td><a href="viewProductDetails.php?pid=<?php echo $row['id_products']?>" >
                                    <input type="button" value="View Details" />
                                </a>
                                <a href="actions/addToCart.php?pid=<?php echo $row['id_products'];?>">
                                    <input type="button" value="Add to Cart" /></a></td>
                    </tr>
                 <?php    
                    }
                }?>
            </table>

        </div>
         <?php include './include/footer.php';?>
    </body>
</html>
