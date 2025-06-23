
<html>
    
    <?php
    include './DB_connection.php';
    ?>
    <head>
        
        <link type="text/css" rel="stylesheet" href="style.css"/>
        
    </head>
    <body class="b6">
        <h1>Register products here</h1>
        <form action="registerProducts.php" method="POST">
            Name : <input type="text" name="inname" id="inname"/><br><br>
            Description :<input type="text" name="indescription" id="indescription"/><br><br>
            Category : <input type="text" name="incategory" id="incategory"/><br><br>
            Sell price : <input type="text" name="sellprice" id="sellprice"/><br><br>
            Buy price : <input type="text" name="buyprice" id="buyprice"/><br><br>
            IS active :  <input type="text" name="isactive" id="isactive"/><br><br>
            <input class="b111" type="submit" value="Register"/>
            
        </form>
        
        <table class="t">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>Category</td>
                <td>Sell_price</td>
                <td>Buy_price</td>
                <td>Is_active</td>
                <td>#</td>
            </tr>
            <?php 
            $query="SELECT id,name,description,category,sellPrice,buyPrice,is_active FROM product";
            $result=$connection->query($query);
            while($row=$result->fetch_assoc()){
            
                ?><form action="updateProducts.php" method="POST">
            <tr>
                <td><input type="text" name="id" value="<?php echo $row["id"]; ?>"/></td>
                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"/></td>
                <td><input type="text" name="description" value="<?php echo $row["description"]; ?>"/></td>
                <td><input type="text" name="category" value="<?php echo $row["category"]; ?>"/></td>
                <td><input type="text" name="sellPrice" value="<?php echo $row["sellPrice"];?>"</td>
                <td><input type="text" name="buyPrice" value="<?php echo $row["buyPrice"]; ?>"/></td>
                <td><input type="text" name="isactive" value="<?php echo $row["is_active"]; ?>"/></td>
                <td><input type="submit" value="UPDATE"/></td>
                <td><a href="deleteProducts.php?id=<?php echo $row["id"]; ?>">DELETE</a></td>
                
            </tr>
                </form>
            <?php } ?>
        
    </body>
    
    
    
</html>







