<?php
session_start();


$productId="";
if(isset($_GET['pid'])){$productId =$_GET['pid'];}


if(isset($_POST['pid'])){$productId =$_POST['pid'];}
if ($productId==""){    header("Location: ../index.php?msg=incorrect product ");die();}

$cart;


if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
} else {
    $cart = array();
}

foreach ($cart as $key => $value) {
  
    if($value[0]==$productId){
        unset($cart[$key]);
    }

} 

$_SESSION['cart'] =$cart;

header("Location: ../cart.php");