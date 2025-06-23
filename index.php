

<?php 

include 'Actions/dbconnection.php';


$query ="SELECT * FROM product_category";

$result= $conn->query($query);

 ?>




<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    
    <div align="center">
    	<form method="get" action="advnceSearch.php">
    		<input type="text" name="keyword">

<select name="selectedCategory">
    		<option value="">All Categories</option>

    		<?php 

    		if ($result->num_rows > 0) {

    			while ($row = $result->fetch_assoc()) {
    				?>

    				<option value="<?php echo $row['id_product_category'] ?>"><?php echo $row['category_name']; ?></option>


    				<?php




    			}
    		}


    		 ?>

</select>
<input type="submit" value="search">
    	</form>

    </div>
<?php 


 ?>
</body>
</html>