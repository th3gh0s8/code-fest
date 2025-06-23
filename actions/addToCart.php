<?php

session_start();

$productId = "";

if (isset($_GET['pid'])) {
    $productId = $_GET['pid'];
}
if (isset($_POST['pid'])) {
    $productId = $_POST['pid'];
}

if ($productId == "") {
    header("Location:../index.php?msg=invalid product id");
    die();
}
//define the cart
$cart;
//assign cart

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}
$isInTheCart=false;
foreach ($cart as $key =>$value) {
    if ($value[0]==$productId) {
        $currentQty=$value[1];
        unset($cart[$key]);
        $cartItem = array($productId,$currentQty+1);
        array_push($cart, $cartItem);
        $isInTheCart=true;
    }
}
if (!$isInTheCart) {
     //parm 0-> product id param 1->1
$cartItem = array($productId,1);

array_push($cart, $cartItem);  }

 

$_SESSION['cart'] = $cart;

header("Location: ../cart.php");
?>
  
