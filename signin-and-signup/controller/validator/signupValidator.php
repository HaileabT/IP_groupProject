<?php
echo "Welcome to this page!";
require "../../../controller/database/dbConnection.php";
require ("../../controller/database/users/userTable.php");
$first_name = $middle_name = $last_name = $email = $password = $conf_password = $telephone = $account_no = "";
$check;
$account_type = "cbe";
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_type = $_POST["bank"];
    $first_name = inputCollector($_POST["first-name"]);
    $middle_name = inputCollector($_POST["last-name"]);
    $last_name = inputCollector($_POST["middle-name"]);
    $email = inputCollector($_POST["email"]);
    $password = inputCollector($_POST["password"]);
    $conf_password = inputCollector($_POST["conf-password"]);
    $telephone = inputCollector($_POST["tel"]);
    $account_no = inputCollector($_POST["acc-no"]);
    $account_type = $_POST["bank"];
    if (!isset($first_name)) {
        $error["first_name"][] = "first name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["first_name"][] = "name length must be greater than 3";
        }
        if (!preg_match('/^[a-zA-Z\s\-]+$/', $first_name)) {
            $error["first_name"][] = "invalid name";
        }
    }
    if (!isset($middle_name)) {
        $error["middle_name"][] = "middle name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["middle_name"][] = "name length must be greater than 3";
        }
        if (!preg_match('/^[a-zA-Z\s\-]+$/', $middle_name)) {
            $error["middle_name"][] = "invalid name";
        }
    }
    if (!isset($last_name)) {
        $error["last_name"][] = "last name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["last_name"][] = "name length must be greater than 3";
        }
        if (!preg_match('/^[a-zA-Z\s\-]+$/', $last_name)) {
            $error["last_name"][] = "invalid name";
        }
    }
    if (!isset($password)) {
        $error["password"][] = "password is required";
    } else {
        if (strlen($password) < 8) {
            $error["password"][] = "password length must be greater than 8";
        }
        if (strlen($password) > 15) {
            $error["password"][] = "password length must be less than 15";
        }
    }
    if (!isset($conf_password)) {
        $error["conf_password"][] = "password is required";
    } else {
        if (strlen($conf_password) < 8) {
            $error["conf_password"][] = "password length must be greater than 8";
        }
        if (strlen($conf_password) > 15) {
            $error["conf_password"][] = "password length must be less than 15";
        }
        if (!$conf_password == $password) {
            $error["conf-password"][] = "password doesn't match";
        }
    }
    if (!isset($email)) {
        $error["password"][] = "email is required";
    } else {
        if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email)) {
            $error["email"][] = "invalid email address";
        }
    }
    if (!isset($account_no)) {
        $error["account_no"][] = "account number is required";
    } else {
        if (!preg_match('/^\d{9,18}$/', $account_no) || strlen($account_no) < 9 || strlen($account_no) > 18) {
            $error["account_no"] = "invalid account number";
        }
    }
    if (!isset($telephone)) {
        $error["telephone"][] = "account number is required";
    } else {
        if (!preg_match('/^\d{10,12}$/', $telephone) || strlen($telephone) < 10 || strlen($telephone) > 12) {
            $error["telephone"] = "invalid telephone number";
        }
    }
    if (!isset($_POST["policy"])) {
        $error["policy"][] = "please select the check box";
    } else {
        $check = $_POST["policy"];
    }
}
function inputCollector($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// tableCreation($connection) . "<br/>";
// alterTable($connection);
if (empty($error)) {
    insertUser($connection, $first_name, $middle_name, $last_name, $email, $hashed_password, $telephone, $account_type, $account_no) . "<br/>";
} else {
    header("location:../../../signin-and-signup/signup.php?error=please fill all information correctly");
}
  
