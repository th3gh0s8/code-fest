<?php 
include './DB_connection.php';
session_start();

if(isset($_SESSION["is login"])){
     if($_SESSION["is login"]){
         
         header("Location: adminHome.php");
     }
     } else {
         if(isset($_POST["username"]) && isset($_POST["password"])){

$un= $_POST['username'];
echo '<br>';
$pw= $_POST['password'];
 $query="SELECT username,password FROM users where username='".$un."' && password='".$pw."' ";
        $result=$connection->query($query); 
        if($row=$result->fetch_assoc()){
            
            $_SESSION["name"] = "your username is".$un;
           $_SESSION["is login"]= true;
        header("Location: adminHome.php");   
            exit();
            
        }
        else{
           
            echo 'Incorrect Username or Password ';
         }} else {
    header("Location: index.php?msg?username and password is not found!");  
        }
     }
        ?>