<?php
session_start();

include './action/error_handlling.php';
include './action/dbconnection.php';
$is_login = "";
$userid = "";
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}

if ($is_login != true) {
    header("Location:login.php?msg=please login again");
    die();
}

$getprofiledata = "SELECT * FROM users WHERE id_users='" . $userid . "'";
$result = $conn->query($getprofiledata);


$name = "";
$address = "";
$contactNo = "";
$email = "";
$username = "";
$password = "";


if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {

        $name = $row['name'];
        $address = $row['address'];
        $contactNo = $row['contact_no'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
    }
} else {
    
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <div align="center">
            <table border="1">

                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="logout.php">Logout</a></td>
                </tr>

            </table>

        </div>
        <br>
        <div align="center">
            <?php
            if (isset($_GET['msg'])) {
                ?>
                <p style="color: red"><?php echo $_GET['msg']; ?></p>

    <?php
}
?>
            <h2>PROFILE</h2>

            <img src="images/profileImage.jfif" width="100" height="100">
            <form action="action/updateprofile.php" method="post">
                <table border="0" style="background-color: appworkspace">

                    <tr>
                        <td>ID NUMBER</td>
                        <td><?php echo $userid; ?></td>
                    </tr>
                    <tr>
                        <td>NAME</td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
                    </tr>
                    <tr>
                        <td>ADDRESS</td>
                        <td><input type="text" name="address" value="<?php echo $address; ?>" /></td>
                    </tr>
                    <tr>
                        <td>CONTACT NO</td>
                        <td><input type="text" name="contactNo" value="<?php echo $contactNo; ?>" /></td>
                    </tr>
                    <tr>
                        <td>EMAIL</td>
                        <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
                    </tr>
                    <tr>
                        <td>USERNAME</td>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td><input type="password" name="password" value="<?php echo $password; ?>" /></td>
                    </tr>
                    <tr>
                        <td><a href="action/deactivateuser.php">DEACTIVATE ACCOUNT</a></td>
                        <td><input type="submit" value="UPDATE" /></td>

                    </tr>

                </table>
            </form>
        </div>




    </body>
</html>