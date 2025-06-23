<html>
    
    <?php
    include './DB_connection.php';
    ?>
    <head>
        
        <link type="text/css" rel="stylesheet" href="style.css"/>
    </head>
    <body class="b7">
        <h1>Register orders here</h1>
        <form action="registerOrders.php" method="POST">
            Amount : <input type="text" name="inamount" id="inamount"/><br><br>
            Date :<input type="date" name="indate" id="indate"/><br><br>
            Created by : <input type="text" name="increate" id="increate"/><br><br>
            Processed by : <input type="text" name="inprocess" id="inprocess"/><br><br>
            is_Paid : <input type="text" name="ispaid" id="ispaid"/><br><br>
           Payment :  <input type="text" name="inpayment" id="inpayment"/><br><br>
           Status  : <input type="text" name="instatus" id="instatus"/><br><br>
           <input class="b111" type="submit" value="Register"/>
            
        </form>
    </body>
</html>