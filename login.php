<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
          <?php include './include/header.php'; ?>
     
        <div class="container" align = "center"> 
            <h2>Login</h2>
            <br>
            <form method="post" action="actions/loginAction.php">
            <table border="0" style="background-color: aqua">  
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" value="" /></td> 
                </tr> 
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" value="" /></td> 
                </tr> 
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login" /></td> 
                </tr> 
        </table>
        </form>
        </div>
            <?php include './include/footer.php'; ?>
     
    </body>
</html>
