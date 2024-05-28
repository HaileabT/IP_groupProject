<?php
include "../../controller/database/users/editProfile.php";
include "../../../controller/database/dbConnection.php";
// include "../../.././userProfile/profile.php";

$first_name = $middle_name = $last_name = $avatar = $account_type = $account_no = "";
$error = [];
if ($_POST["edit"]) {
    $first_name = inputCollector($_POST["first-name"]);
    $middle_name = inputCollector($_POST["last-name"]);
    $last_name = inputCollector($_POST["middle-name"]);
    $account_no = inputCollector($_POST["acc-no"]);
    $account_type = inputCollector($_POST["bank"]);
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
    if (!isset($account_no)) {
        $error["account_no"][] = "account number is required";
    } else {
        if (!preg_match('/^\d{9,18}$/', $account_no) || strlen($account_no) < 9 || strlen($account_no) > 18) {
            $error["account_no"] = "invalid account number";
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
if (empty($error) && $_SESSION["id"]) {
    editProfile($connection, $_SESSION["id"], $first_name, $last_name, $middle_name, $account_type, $account_no);
    header("location:../../.././userProfile/profile.php");
}
