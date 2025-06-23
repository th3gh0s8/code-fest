<?php

session_start();

include './dbconnection.php';





$username = "";

$password = "";





if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}






if ($username == "") {
    header("Location: ../login.php?msg=username not found !");
    die();
}

if ($password == "") {
    header("Location: ../login.php?msg=password not found !");
    die();
}


$selectque = " SELECT * FROM users WHERE username= '" . $username . "' ";


$result = $conn->query($selectque);

if ($result->num_rows > 0) {
    
    if ($row = $result->fetch_assoc()) {
        
        $pass=$row['password'];
        $is_active =$row['is_active'];


        if ($row['is_active']!= '1') {
            header("Location:../login.php?msg=Inactive user");
            die();
        } else if ($password == $pass) {

            $_SESSION['userid'] = $row['id_users'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['is_login'] = TRUE;


            header("Location:../home.php?msg=welcome");
            die();
        } else {
            header("Location:../login.php?msg=incorrect password");
            die();
        }
    }
} else {
    header("Location:../login.php?msg=invalid user");
    die();
}
?>

