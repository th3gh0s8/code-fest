<?php

session_start()


$productId="";

if(isset($_POST['pid'])){$productId =$_POST['pid'];}
if ($productId==""){    header("Location:# ");die();}


$cart;

is(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
} else {
    $cart = array();
}

$cartItem = array($productId,1);
array_push( $cart,$cartItem);

$_SESSION['cart']=$cart;

header("Location: cart.php");

        
?>        
        