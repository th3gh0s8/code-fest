<?php

session_start();

include "dbconnection.php";

$name = "";
$address = "";
$city = "";
$contactNo = "";

$email = "";

$username = "";

$password = "";


$cart = "";


if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['address'])) {
    $address = $_POST['address'];
}

if (isset($_POST['city'])) {
    $city = $_POST['city'];
}

if (isset($_POST['contactno'])) {
    $contactNo = $_POST['contactno'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}


if ($name == "" || $address == "" || $city == "" || $contactNo == "" || $cart == "") {

    header("Location: checkout.php?msg= inncorect Recquest ");

    die();
}



$insQuery = "INSERT INTO `users`(`name`,`address`,`contact_no`,`email`,`username`,`password`,`user_type`,`is_active`) VALUES('" . $name . "','" . $address . "','" . $contactNo . "','" . $email . "','" . $username . "','" . $password . "','2','1')";

//echo $insQuery;
$result = $conn->query($insQuery);

if ($result === TRUE) {
    echo 'query sucess <br>';

    $result = $conn->query("SELECT id_users FROM users WHERE email='" . $email . "'");

    $row = $result->fetch_assoc();
    $saved_user_id = $row['id_users'];


    echo "saved_user_id" . $saved_user_id;

    $totalAm = 0.0;


    foreach ($cart as $catItem) {

        $productQuery = "SELECT * FROM products WHERE id_products = '" . $catItem[0] . "'   ";

        $result = $conn->query($productQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $rowamu = ($row['sell_price'] * $cartItem[1]);
            $totalAmu = $totalAmu + $rowamu;
            $isProduct = TRUE;
        }
    }
    $saveInvoice = " INSER INTO invoice(invoice_date,total_amount,invoice_to,invoice_checked_by,status) VALUES(now(),'" . $totalAmu . "','" . $saved_user_id . "',null,'2')";

    $result = $conn->query($saveInvoice);
    if ($result === TRUE) {

        echo 'invoice saved successfully';
    } else {

        echo 'error' . mysqli_error($conn);
    }
}

?>