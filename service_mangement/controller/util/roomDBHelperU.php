<?php
require "./../../../controller/database/dbConnection.php";
require "../database/services.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $new_room_name = !array_key_exists('room-name', $_POST) || !$_POST['room-name'] ? "" : $_POST['room-name'];
    $new_room_price = !array_key_exists('room-price', $_POST) || !$_POST['room-price'] ? "" : $_POST['room-price'];
    $new_room_picture = !array_key_exists('room-picture', $_POST) || !$_POST['room-picture'] ? "" : $_POST['room-picture'];
    $new_room_type = !array_key_exists('room-type-select', $_POST) || !$_POST['room-type-select'] ? "" : $_POST['room-type-select'];

    updateRoom($connection, $new_room_name, $new_room_price, $new_room_picture, $new_room_type, intval($_POST['room_choice_id']));
    header("Location: ../../service-management.php");
}

?>