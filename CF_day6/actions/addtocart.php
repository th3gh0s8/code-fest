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


$isExist= FALSE;

foreach ($cart as $key => $value) {
  
    if($value[0]==$productId){

    	$cyrrentQty=$value[1];

        unset($cart[$key]);

        $cartItem = array($productId,$cyrrentQty+1);

        array_push( $cart,$cartItem);

        $isExist= TRUE;
    }

}





if (!$isExist) {
	$cartItem = array($productId,1);
array_push( $cart,$cartItem);

}



$_SESSION['cart']=$cart;

header("Location: ../cart.php");

        
?>        
        