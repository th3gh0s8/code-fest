
<html>
    
    <?php
    include './DB_connection.php';
    ?>
    <head>
        
        
    </head>
    <body style="background-color: blanchedalmond;">
        <h1>Register user here</h1>
        <form action="getRegister.php" method="POST">
            Name : <input type="text" name="inname" id="inname"/><br><br>
            Birthday :<input type="date" name="inbirthday" id="inbirthday"/><br><br>
            Email : <input type="email" name="inemail" id="inemail"/><br><br>
            Admin type : <input type="text" name="intype" id="type"/><br><br>
            Username : <input type="text" name="inusername" id="inusername"/><br><br>
           Password :  <input type="text" name="inpassword" id="inpassword"/><br><br>
           <input class="b111" type="submit" value="Register"/>
            
        </form>
        
        <table class="t">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Birthday</td>
                <td>Email</td>
                <td>Admin_type</td>
                <td>Username</td>
                <td>Password</td>
                <td>#</td>
            </tr>
            <?php 
            $query="SELECT id,name,birthday,email,type,username,password FROM users";
            $result=$connection->query($query);
            while($row=$result->fetch_assoc()){
            
                ?><form action="updateUser.php" method="POST">
            <tr>
                <td><input type="text" name="id" value="<?php echo $row["id"]; ?>"/></td>
                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"/></td>
                <td><input type="date" name="birthday" value="<?php echo $row["birthday"]; ?>"/></td>
                <td><input type="email" name="email" value="<?php echo $row["email"]; ?>"/></td>
                <td><input type="text" name="type" value="<?php echo $row["type"];?>"</td>
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







