<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
          <?php include './include/header.php'; ?>
      
        <div align = "center">
           
            
            <h2>Register</h2>
            <br>
            <form method="post" action="actions/registerAction.php">
            <table border="0" style="background-color: activeborder"> 
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" value="" /></td> 
                </tr> 
                <tr>
                    <td>Address : </td>
                    <td><input type="text" name="address" value="" /></td> 
                </tr> 
                <tr>
                    <td>Contact No : </td>
                    <td><input type="text" name="contactno" value="" /></td> 
                </tr> 
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="email" value="" /></td> 
                </tr> 
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" value="" /></td> 
                </tr> 
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" value="" /></td> 
                </tr> 
                <tr>
                    <td>Re-Password : </td>
                    <td><input type="password" name="retypePassword" value="" /></td> 
                </tr> 
                <tr>
                    <td></td>
                    <td><input type="submit" value="Register" /></td> 
                </tr> 
        </table>
        </form>
        </div>
        <?php include './include/footer.php'; ?>
    </body>
</html>
