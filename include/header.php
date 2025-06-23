<?php 
if(session_id() == '') {
    session_start();
}

 $is_login = false;
 $user_type = "";
if(isset($_SESSION['is_login'])){
    $is_login = $_SESSION['is_login'];
}


if(isset($_SESSION['user_type'])){
    $user_type = $_SESSION['user_type'];
}


?>
<header class="header">
    <div><h2>CODEFEST:2021</h2></div>
    <div>  
        <ul class="menu">
            <a href="index.php"><li>Home</li></a>
            <a href="AdvancedSearch.php"><li>Search</li></a>
            <a href="cart.php"><li>Cart</li></a>
            <li><a href="profile.php">Profile</a></li>
           <?php if ($user_type==1){
                ?>
                     <li><a href="admin.php">Admin</a></li>
               <?php
            }?>
            <li>About Us</li>
            <li>Contact Us</li> 
        </ul> </div>
    <div>
        <?php
        if($is_login){
            ?>  
        <a href="actions/logout.php">Logout</a>
        <?php 
        }else{
            ?>
        <a href="login.php">Login</a>  
        <a href="register.php">Register</a>
        <?php  
        }
        ?>
    </div>
</header><hr>
  <?php
            if(isset($_GET['msg'])){
                ?>
            <p  style="color: red;" align="center"><?php echo $_GET['msg'];?></p>
            <hr>
            <?php
} 
            ?>