<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        <h2>Register</h2>
        <form action="action/registerAction.php" method="post">

            <table border="0">

                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"  /></td>
                </tr>
                <tr>
                    <td>address</td>
                    <td><input type="text" name="address"  /></td>
                </tr>
                <tr>
                    <td>contact_no</td>
                    <td><input type="text" name="contact_no" /></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email" /></td>
                </tr>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password"  /></td>
                </tr>
                <tr>
                    <td>retype password</td>
                    <td><input type="password" name="retypepassword"  /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="register" />
                    </td>
                </tr>


            </table>

        </form>
    </div>
</body>
</html>