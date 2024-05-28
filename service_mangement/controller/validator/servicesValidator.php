<?php

try {

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $roomName = stripslashes(htmlspecialchars($_POST['room-name']));
        $price = floatval($_POST['room-price']);
        $roomType = stripslashes(htmlspecialchars($_POST['room-type-select']));

        require "./../../../controller/database/dbConnection.php";
        require "../database/services.php";

        if (!isset($_POST['room-name']) || !isset($_POST['room-price']) || !isset($_POST['room-picture']) || !isset($_POST['room-type-select'])) {
            header("Location: /service_mangement/service-management.php?error=Please insert the required fields");
            exit();
        }
        // tableCreation($connection);
        if (insertRoom($connection, $roomName, $price, $roomType)) {
            //some code
            header("Location: /service_mangement/service-management.php?success=Added Room");
            exit();
        } else {
            header("Location: /service_mangement/service-management.php?error=Internal Server Error");
            exit();
        }
        $id;
        $findRoom = "SELECT * FROM rooms WHERE room_name='$roomName'";
        $room = $connection->query($findRoom);
        if ($room) {
            $data = $room->fetch_array();
            $id = $data[0];
        } else {
            header("Location: /service_mangement/service-management.php?error=Internal Server Error");
            exit();
        }


        $filePath = $_FILES['room-picture']['tmp_name'];
        echo $_POST['room-name'];
        $dirpath = "./../../../public/images/rooms/room$id";
        mkdir($dirpath);
        $newFilePath = "$dirpath/room$id.webp";
        if (!move_uploaded_file($filePath, $newFilePath)) {
            copy($filePath, $newFilePath);
        } else {
            header("Location: /service_mangement/service-management.php?error=Internal Server Error");
            exit();
        }

        if (mysqli_query($connection, "UPDATE rooms SET picture='$newFilePath' WHERE id=$id")) {

        } else {
            header("Location: /service_mangement/service-management.php?error=Internal Server Error");
            exit();
        }

    }

} catch (Exception) {
    header("Location: /service_mangement/service-management.php?error=Internal Server Error");
    exit();
}

?>