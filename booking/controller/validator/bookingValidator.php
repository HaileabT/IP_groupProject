<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "./../../../controller/database/dbConnection.php";
    require "../database/bookingInfo.php";

    if (array_key_exists('user', $_POST)) {
        if (!isset($_POST['room_choice_id']) || !isset($_POST['number-of-guests']) || !isset($_POST['arrival-date']) || !isset($_POST['departure-date'])) {
            header("Location: /booking/booking.php?error=Please give all the necessary information.");
            exit();
        }
    } else {
        if (!isset($_POST['first-name']) || !isset($_POST['last-name']) || !isset($_POST['email']) || !isset($_POST['room_choice_id']) || !isset($_POST['number-of-guests']) || !isset($_POST['arrival-date']) || !isset($_POST['departure-date'])) {
            header("Location: /booking/booking.php?error=Please give all the necessary information.");
            exit();
        }
    }
    if (!array_key_exists('user', $_POST) || empty($_POST['user'])) {
        insertBookingInfo($connection, $_POST['first-name'], $_POST['last-name'], $_POST['email'], null, $_POST['room_choice_id'], intval($_POST['number-of-guests']), date('Y-m-d H:i:s', strtotime($_POST['arrival-date'])), date('Y-m-d H:i:s', strtotime($_POST['departure-date'])));
    } else {
        insertBookingInfo($connection, "", "", "", intval($_POST['user']), $_POST['room_choice_id'], intval($_POST['number-of-guests']), date('Y-m-d H:i:s', strtotime($_POST['arrival-date'])), date('Y-m-d H:i:s', strtotime($_POST['departure-date'])));
    }


}

?>