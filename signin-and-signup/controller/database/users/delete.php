<?php
include "../../../../controller/database/dbConnection.php";
session_save_path('C:\xampp_sessions');
session_start();
function deleteUser($connection, $id)
{
    $sql = "DELETE FROM User WHERE id='$id'";
    if (mysqli_query($connection, $sql)) {
        echo "deleted successfully";
        session_destroy();
    }
}
if (isset($_SESSION["id"])) {
    deleteUser($connection, $_SESSION["id"]);
    header("location:../../../../index.php");
}
