<?php
session_save_path('C:\xampp_sessions');
session_start();
function editProfile($connection, $id, $first_name, $last_name, $middle_name, $account_type, $account_no)
{
    $_SESSION["first_name"] = $first_name;
    $_SESSION["id"] = $id;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["middle_name"] = $middle_name;
    $_SESSION["account_no"] = $account_no;
    $sql = "UPDATE User 
    SET first_name='$first_name', last_name='$last_name', middle_name='$middle_name', account_type='$account_type', account_no='$account_no'
    WHERE id='$id'";
    if (mysqli_query($connection, $sql)) {
        echo "updated successfully";
    } else {
        echo "update rejected";
    }
}
