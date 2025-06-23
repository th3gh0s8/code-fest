<?php
include_once './errorController.php';
include './DB_Conn.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <!-- meka mn hadapu hedder eka-->
        <header class="nav">
            <table>
                <tr>
                
                    <th><a href="index.php" style="padding-left: 50px;"><button>home</button></a></th>
                    <th style="/*background-color:blue; */padding-left: 900px"><button>Contact us</button> <!--methanat enn oni ewa tika liyann--></th>
                </tr>
            </table>
             
      <!-- meka isharayage eka(header)  
      <div class="logo">
        <img src="images\logo.png">
      </div>
      <div class="nav">
        <ul>
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="">Gallery</a>
            <ul class="subnav">
              <li><a href="events.html">Events</a></li>
              <li><a href="bestbodybuilders.html">Best Body Builders</a></li>
            </ul>
          </li>
          <li>
            <a href="">Schedule</a>
            <ul class="subnav2">
               <li><a href="weekschedule.html">Weekly Shedule</a></li>
                <li><a href="holidays.html">Holidays</a></li>
                </ul>
          </li>
          <li>
            <a href="">What we do</a>
            <ul class="subnav3">
                <li><a href="aerobics.html">Aerobics</a></li>
                <li><a href="bodybuilding.html">Body Building</a></li>
                  <li><a href="yoga.html">Yoga</a></li>
            </ul>

          </li>
          <li>
            <a href="contact.html">Contact Us</a>
          </li>
        </ul>
      </div>-->
  </header>
    <center>
        <div><form>
            <table>
                <tr><th>First Name</th>><td><input type="text" name="fName" id=""  /></td></tr>
                <tr><th>Last Name</th>><td> <input type="text" name="lName" id=""  /></td></tr>
                <tr><th>Email</th>><td><input type="email" name="email" id=""  /></td></tr> 
                <tr><th>password</th>><td><input type="password" name="pw"></td></tr>
                <tr><th>BirthDay</th>><td><input type="date" name="bday" id="" /></td></tr>
                <tr><th colspan="2"><center><input type="submit" name="reg" value="register"></center></th><td></td>
            </table>
            </form>
        </div>
    </center>
        <br> <table>
            <tr>
                <td>Id</td><td>Name</td><td>birthday</td><td>email</td><td>#</td>
            </tr>
<?php
$query = "SELECT id,name,birthday,email FROM users";
$result = $connection->query($query);
while ($row = $result->fetch_assoc()) {
    ?>
                <form action="updateUser.php" method="POST" >
                    <tr>
                        <td><input type="text" name="id" id="id" value="<?php echo $row["id"]; ?>" /></td>
                        <td><input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" /></td>
                        <td><input type="date" name="birthday" id="birthday" value="<?php echo $row["birthday"]; ?>" /></td>
                        <td><input type="email" name="email" id="email" value="<?php echo $row["email"]; ?>" /></td>
                        <td><input type="submit" value="UPDATE" /> </td>
                        <td><a href="deleteUser.php?id=<?php echo $row["id"]; ?>">DELETE</a></td>
                    </tr>
                </form>
    <?php
}
?>
        </table>
 <footer>
  <p>Author: </p>
  <p><a href=""></a></p>
</footer> 
    </body>
</html>