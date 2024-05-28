<?php
echo "Welcome to this page!";
require "../../../controller/database/dbConnection.php";
require("../../controller/database/users/userTable.php");
$first_name = $middle_name = $last_name = $email = $password = $conf_password = $telephone = $account_no = $bank = "";
$check = $_POST["policy"];
$error = [];
$check = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = inputCollector($_POST["first-name"]);
    $middle_name = inputCollector($_POST["last-name"]);
    $last_name = inputCollector($_POST["middle-name"]);
    $email = inputCollector($_POST["email"]);
    $password = inputCollector($_POST["password"]);
    $conf_password = inputCollector($_POST["conf-password"]);
    $telephone = inputCollector($_POST["tel"]);
    $account_no = inputCollector($_POST["acc-no"]);

    $bank = $_POST["bank"];
    if (isset($first_name)) {
        $error["first_name"][] = "first name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["first_name"][] = "name length must be greater than 3";
        }
        if (!preg_match($first_name, '/^[a-zA-Z\s\-]+$/')) {
            $error["first_name"][] = "invalid name";
        }
    }
    if (isset($middle_name)) {
        $error["middle_name"][] = "middle name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["middle_name"][] = "name length must be greater than 3";
        }
        if (!preg_match($first_name, '/^[a-zA-Z\s\-]+$/')) {
            $error["middle_name"][] = "invalid name";
        }
    }
    if (isset($last_name)) {
        $error["last_name"][] = "last name is required";
    } else {
        if (strlen($first_name) < 3) {
            $error["last_name"][] = "name length must be greater than 3";
        }
        if (!preg_match($first_name, '/^[a-zA-Z\s\-]+$/')) {
            $error["last_name"][] = "invalid name";
        }
    }
    if (isset($password)) {
        $error["password"][] = "password is required";
    } else {
        if (strlen($password) < 8) {
            $error["password"][] = "password length must be greater than 8";
        }
        if (strlen($password) > 15) {
            $error["password"][] = "password length must be less than 15";
        }
    }
    if (isset($conf_password)) {
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
    if (isset($email)) {
        $error["password"][] = "email is required";
    } else {
        if (!preg_match($email, '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/')) {
            $error["email"][] = "invalid email address";
        }
    }
    if (isset($account_no)) {
        $error["account_no"][] = "account number is required";
    } else {
        if (!preg_match($account_no, '^\d{9,18}$') || $account_no < 10 || $account_no > 18) {
            $error["account_no"] = "invalid account number";
        }
    }
    if (isset($telephone)) {
        $error["telephone"][] = "account number is required";
    } else {
        if (!preg_match($telephone, '^\d{10,12}$') || $tel < 9 || $account_no > 12) {
            $error["telephone"] = "invalid account number";
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
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// tableCreation($connection) . "<br/>";
insertUser($connection, $first_name, $middle_name, $last_name, $email, $hashed_password, $telephone, $account_no) . "<br/>";