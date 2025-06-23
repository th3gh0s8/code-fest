<!DOCTYPE html>

<?php 



 include './action/error_handlling.php';
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_GET['msg'])) {
           
        ?>
        <h2><?php echo $_GET['msg']; ?></h2>
        <?php
    }
    ?>

    <div >

        <h2>LOg in</h2>
        <form action="action/loginAction.php" method="post">

            <table border="0">

             
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password"  /></td>
                </tr>
        
                <tr>
                    <td></td>
                    <td><input type="submit" value="Log In" />
                    </td>
                </tr>


            </table>

        </form>
    </div>
</body>
</html>
