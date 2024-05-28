<?php
require "../../../controller/database/dbConnection.php";
session_save_path('C:\xampp_sessions');
session_start();
$email = $password = "";
$error = [];

if (isset($_POST["login"])) {
    $email = inputCollector($_POST["email"]);
    $password = inputCollector($_POST["password"]);
    if (empty($email)) {
        header("location: ./../../signin.php?error=email is required");
        exit();
    } else {
        if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email)) {
            header("location: ./../../signin.php?error=invalid email format");
            exit();
        }
    }

    if (empty($password)) {
        header("location: ./../../signin.php?error=password is required");
        exit();
    } else {
        if (strlen($password) < 8 || strlen($password) > 20) {
            header("location: ./../../signin.php?error=password must be between 8 and 20 characters");
            exit();
        }
    }
}

function inputCollector($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}
$sql = "SELECT * FROM User WHERE email='$email'";
$user = mysqli_query($connection, $sql);
if (!$user) {
    die("query failed " . mysqli_error($connection));
}
if ($row = mysqli_fetch_array($user)) {
    $user_id = $row['id'];
    $user_name = $row["first_name"];
    $user_email = $row["email"];
    $user_password = $row["passsword"];


    if (password_verify($password, $user_password)) {

        echo "Logged In";
        $_SESSION["email"] = $user_email;
        $_SESSION["id"] = $user_id;
        $_SESSION["first_name"] = $user_name;
        header("location: ../../../userProfile/profile.php?user_id= " . $user_id);
        exit();
    } else {
        header("location: ./../../signin.php?error=invalid password or email");
        exit();
    }
} else {
    header("location: ./../../signin.php?error=invalid password or email");
    exit();
}

