 <?php
 include './actions/dbConnection.php';
 $pid = "";
 if(isset($_GET['pid'])){$pid = $_GET['pid'];}
  if($pid==""){     header("Location: ./index.php");     die();}
 
 $query = "Select * from products where id_products = '".$pid."'";
 
 $result = $conn->query($query);
 
 
 $name;$desc;$sellPrice;$proImage;
 
 if($result->num_rows > 0){
     $row=$result->fetch_assoc();
      $name = $row["product_name"];
      $desc = $row["product_description"];
      $sellPrice = $row["sell_price"];
      $proImage = $row["product_profile_img"];
 }else{
     header("Location: ./AdvancedSearch.php?msg=Product not Found !");
 }
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Product Details</title>
          <link href="css/codefest_css.css" type="text/css" rel="stylesheet"/> 
    </head>
    <body>
        <?php include './include/header.php'; ?> 
            
        <div align="center" width="100%" height="90%">
        <table>
            <tr>
                <td><img src="<?php echo "actions/".$proImage; ?>" width="400" height="400" /></td>
                <td>
                    <h2><?php echo $name;?></h2>
                    <h4><?php echo $desc;?></h4>
                    <h5><?php echo $sellPrice;?></h5>
                    
                    <form method="post" action="actions/addToCart.php">
                        <input type="hidden" name="pid" value="<?php echo $pid;?>" />
                    <input type="submit" value="Add to Cart" >
                    </form>
                </td>
            </tr>
        </table>
        </div> 
        <?php include './include/footer.php'; ?>
    </body>
</html>
