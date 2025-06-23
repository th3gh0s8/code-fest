<?php
session_start();
include './actions/dbConnection.php';

$user_ID = "";
if (isset($_SESSION['userid'])) {
    $user_ID = $_SESSION['userid'];
}

$is_login = false;
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}


$name = "";
$address = "";
$city = "Colombo";
$contactNo = "";
$email = "";
if ($is_login) {
    $query2 = "select * from users where id_users = '" . $user_ID . "'";
    $resultUser = $conn->query($query2);
    $record = $resultUser->fetch_assoc();
    $name = $record['name'];
    $address = $record['address'];
    $contactNo = $record['contact_no'];
    $email = $record['email'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" type="text/css" rel="stylesheet"/> 
    </head>
    <body>
<?php include './include/header.php'; ?>
        <div align="center"> 
            <h2>Checkout</h2> 
            <table border="1"> 
                <b>Billing and Delivery Details</b>
                <form method="post" action="actions/checkoutAction.php" >
                    <table border="0">
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        </tr>
                        <tr>
                            <td>address:</td>
                            <td><textarea type="text" name="address"><?php echo $address; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><input type="text" name="city" value="Colombo"></td>
                        </tr>
                        <tr>
                            <td>Contact Number:</td>
                            <td><input type="text" name="contactNumber"  value="<?php echo $contactNo; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email"  value="<?php echo $email; ?>"></td>
                        </tr>
                       
             <?php if(!$is_login){?>           
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password"></td>
                        </tr>
             <?php }?>
                        
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Update Billing Details"></td>
                        </tr>
                    </table> 
                </form>

        </div>
<?php include './include/footer.php'; ?>
    </body>
</html>
