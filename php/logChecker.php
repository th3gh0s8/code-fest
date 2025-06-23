<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php

$uname = $_POST['uName'];
$pWord = $_POST['pWord'];

if($uname=="root" && $pWord=="toor"){
    echo "Welcome Admin";
} else {
    
    echo "error";   
}
?>