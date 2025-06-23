
<html>

    <?php
    include './DB_connection.php';
    ?>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" type="text/css" href="stylesByGh8.css">
        <!--link type="text/css" rel="stylesheet" href="style.css"/>-->
    </head>
    <body class="b2">
        
       <article>
  <header>
      <table style=" min-height: 200%; min-width: 200;  max-height: 100%; max-width: 100%;" >
          <tr class="navig-item" style="margin-left: 2%; width:50%;/*background-color: antiquewhite;*/">
              <td style="width:5%;"><a><img src="../icons/home(2).png" style=" min-height: 80%; min-width: 80%;  max-height: 90%; max-width: 90%;" /></a></td>
              <td style="width:5%;"><a><img src="../icons/previous.png" style="min-height: 100%; min-width: 100%; max-height: 80%; max-width: 80%;"/></a></td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td  style="width:5%"><a><img src="../icons/menu(2).png" style="min-height: 100%; min-width: 100%; max-height: 25%; max-width: 25%; "/></a> </td>
          </tr>          
      </table>
  </header>
</article>
    <center><h1>Register user here</h1>
        <form action="getRegister.php" method="POST">
            <table>
                <tr>
                    <th> Name : </th> 
                    <td><input type="text" name="inname" id="inname"/></td>
                </tr>
                <tr>
                    <th>Birthday : </th> 
                    <td> <input type="date" name="inbirthday" id="inbirthday"/> </td> 
                </tr>
                <tr>
                    <th>Email :  </th>
                    <td><input type="email" name="inemail" id="inemail"/></td>
                </tr>
                <tr>
                    <th>Admin type : </th> 
                    <td> <input type="text" name="intype" id="type"/></td>
                </tr>
                <tr>
                    <th>Username : </th>
                    <td> <input type="text" name="inusername" id="inusername"/></td>
                </tr>
                <tr>
                    <th>Password :   </th>
                    <td> <input type="text" name="inpassword" id="inpassword"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="b111" type="submit" value="Register"/>
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <table class="respo">
        <tr style="background-color: blueviolet">
            <th>Id</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Admin_type</th>
            <th>Username</th>
            <th>Password</th>
            <th>#</th>
        </tr>
        <?php
        $query = "SELECT id,name,birthday,email,type,username,password FROM users";
        $result = $connection->query($query);
        while ($row = $result->fetch_assoc()) {
            ?><form action="updateUser.php" method="POST">
                <tr style="background-color: burlywood">
                    <td><input type="text" name="id" value="<?php echo $row["id"]; ?>"/></td>
                    <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"/></td>
                    <td><input type="date" name="birthday" value="<?php echo $row["birthday"]; ?>"/></td>
                    <td><input type="email" name="email" value="<?php echo $row["email"]; ?>"/></td>
                    <td><input type="text" name="type" value="<?php echo $row["type"]; ?>"</td>
                    <td><input type="text" name="username" value="<?php echo $row["username"]; ?>"/></td>
                    <td><input type="text" name="password" value="<?php echo $row["password"]; ?>"/></td>
                    <td><input type="submit" value="UPDATE"/></td>
                    <td><a href="deleteUser.php?id=<?php echo $row["id"]; ?>">DELETE</a></td>

                </tr>
            </form>
        <?php } ?>

        <a href="adminHome.php">back</a>
    </body>



</html>







