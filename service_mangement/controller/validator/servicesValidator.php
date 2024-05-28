<?php

try {

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $roomName = stripslashes(htmlspecialchars($_POST['room-name']));
        $price = floatval($_POST['room-price']);
        $roomType = stripslashes(htmlspecialchars($_POST['room-type-select']));

        require "./../../../controller/database/dbConnection.php";
        require "../database/services.php";
        // tableCreation($connection);
        if (insertRoom($connection, $roomName, $price, $roomType)) {
            //some code
        } else {
            echo "<h1>INTERNAL SERVER ERROR 500</h1>";
            die("Something is wrong on the server side!");
        }
        $id;
        $findRoom = "SELECT * FROM rooms WHERE room_name='$roomName'";
        $room = $connection->query($findRoom);
        if ($room) {
            $data = $room->fetch_array();
            $id = $data[0];
        } else {
            echo "<h1>INTERNAL SERVER ERROR 500</h1>";
            die("Something is wrong on the server side!");
        }


        echo $filePath = $_FILES['room-picture']['tmp_name'];
        echo $_POST['room-name'];
        $dirpath = "./../../../public/images/rooms/room$id";
        mkdir($dirpath);
        $newFilePath = "$dirpath/room$id.webp";
        if (!move_uploaded_file($filePath, $newFilePath)) {
            copy($filePath, $newFilePath);
        } else {
            //  $updateRoomPicture = "UPDATE rooms picture=";
            //  header("Location: ./../../service-management.php");
        }

        if (mysqli_query($connection, "UPDATE rooms SET picture='$newFilePath' WHERE id=$id")) {

        } else {
            echo "<h1>INTERNAL SERVER ERROR 500</h1>";
            die("Something went very wrong.");
        }

    }

} catch (Exception) {
    echo " ";
}

?>