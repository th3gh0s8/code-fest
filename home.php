<?php
session_start();



$is_login = "";



if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
} else {
    
}


if ($is_login == "") {
    header("Location: login.php?msg=plzz login again !");
    die();
}
?>
<html>
    
    <head>
        
        <meta charset="UTF-8">
        <title>Home</title>
        
    </head>
    
    
    <body>
        <div align="center">
            
                  <?php
        if (isset($_GET['msg'])) {
           
        ?>
        <h2><?php echo $_GET['msg']; ?></h2>
        <?php
    }
    ?>
            
        
        <table border="0">

                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td></td>
                    <td><a href="profile.php">my profile</a></td>
                    <td><a href="logout.php">log out</a></td>
                </tr>
        
        </table>

        
        
        
        
        </div>
        
        
    </body>
    
    
</html>






<?php


//echo "<a href='logout.php'>Logout</a>"
?>
