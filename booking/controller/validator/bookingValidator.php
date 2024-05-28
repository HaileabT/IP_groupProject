<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "./../../../controller/database/dbConnection.php";
    require "../database/bookingInfo.php";

    echo array_key_exists('room_choice_id', $_POST);
    if (!array_key_exists('user', $_POST) || empty($_POST['user'])) {
        insertBookingInfo($connection, $_POST['first-name'], $_POST['last-name'], $_POST['email'], null, $_POST['room_choice_id'], intval($_POST['number-of-guests']), date('Y-m-d', strtotime($_POST['arrival-date'])), date('Y-m-d', strtotime($_POST['departure-date'])));
    } else {
        insertBookingInfo($connection, "", "", "", intval($_POST['user']), $_POST['room_choice_id'], intval($_POST['number_of_guests']), date('Y-m-d', strtotime($_POST['arrival_date'])), date('Y-m-d', strtotime($_POST['departure_date'])));
    }


}

?>