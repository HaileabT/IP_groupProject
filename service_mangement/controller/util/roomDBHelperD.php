<?php
require "./../../../controller/database/dbConnection.php";
require "../database/services.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    removeRoom($connection, intval($_POST['room_choice_id']));
    header("Location: ../../service-management.php");
}
?>