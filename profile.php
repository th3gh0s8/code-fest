<?php
  if(session_id() == '') {
    session_start();
  }

include './actions/dbConnection.php';
$is_login = "";
$userid = "";
if(isset($_SESSION['is_login'])){$is_login = $_SESSION['is_login'];}
if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];}

if($is_login!=true){header("Location: login.php?msg= Please Login Again!");die();}

$getProfileData = "select * from users where id_users = '".$userid."'";

$result = $conn->query($getProfileData);

$name ="";
$address="";
$contactNo="";
$email="";
$username="";
$password="";

if($result->num_rows>0){
     if($row = $result->fetch_assoc()){
$name =$row['name'];
$address=$row['address'];
$contactNo =$row['contact_no'];
$email =$row['email'];
$username =$row['username'];
$password =$row["password"];
     }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/codefest_css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include './include/header.php';?>
           <div align="center">
        <table border="1">
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="actions/logout.php">Logout</a></td>
                </tr> 
        </table>
        </div>
        <br>
        <div align="center">
              <?php
            if(isset($_GET['msg'])){
                ?>
            <p style="color: red"><?php echo $_GET['msg'];?></p>
            <?php
            } 
            ?>
            
                 <h2>Profile</h2>
                 
                 <img src="images/profileImage.jfif" width="261" height="193" />
      
                 <form method="post" action="actions/updateProfile.php" >
        <table border="0" style="background-color: activecaption"> 
                <tr>
                    <td>ID Number:</td>
                    <td><?php echo $userid;?></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="<?php echo $name;?>"/></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" value="<?php echo $address;?>"/></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><input type="text" name="contactNo" value="<?php echo $contactNo;?>"/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="<?php echo $email;?>"/></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><?php echo $username;?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value="<?php echo $password;?>"/></td>
                </tr>
                
                <tr>
                    <td><a href="actions/deactivateProfile.php">Deactivate Account</a></td>
                    <td><input type="submit" value="Update Account Details" /></td>
                </tr>
            
        </table>
              </form>
              </div>

        <?php include './include/footer.php';?>
    </body>
</html>
