<?php
function tableCreation($connection)
{
    $sql = "CREATE TABLE Rooms (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       room_name VARCHAR(30) NOT NULL,
       price FLOAT NOT NULL,
       picture VARCHAR(50),
       room_type VARCHAR(20) NOT NULL,
       added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if (mysqli_query($connection, $sql)) {
        echo "table created successfully";
    } else {
        echo "Error creating" . $connection->error;
    }
}
function insertRoom($connection, string $room_name, float $price, string $room_type)
{
    $sql = "INSERT INTO Rooms (room_name,price,room_type) VALUES('$room_name',$price,'$room_type')";
    if (mysqli_query($connection, $sql)) {
        echo "user successfully inserted";
        return true;
    } else {
        echo "Creation error" . $sql . mysqli_error($connection);
        return false;
    }
}

function getRoom($connection, $id)
{
    $sql = "SELECT * FROM Rooms WHERE id=$id";
    $room = mysqli_query($connection, $sql);
    if ($room) {
        return $room;
    } else {
        echo "Error Fetching Data!";
        return;
    }
}

function getAllRooms($connection, $room_name = "", $skip = 0, $limit = 10, $orderBy = "", $type = "")
{
    $order = $orderBy == "" ? "" : "ORDER BY $orderBy ASC";
    $searchKey = ($room_name == "") ? "" : "room_name LIKE '%$room_name%'";
    $and = ($room_name != "" && $type != "") ? "AND" : "";
    $searchType = ($type == "") ? "" : "room_type='$type'";
    $searchTypeChoice = ($room_name == "" && $type == "") ? "" : "WHERE $searchKey $and $searchType";
    $sql = "SELECT * FROM rooms $searchTypeChoice $order LIMIT $skip, $limit";
    $data = mysqli_query($connection, $sql);
    if ($data) {
        return $data;
    } else {
        echo "Error Fetching Data!";
        return;
    }
}
function removeRoom($connection, $id)
{
    $sql = "DELETE FROM Rooms WHERE id=$id";
    if (mysqli_query($connection, $sql)) {
        echo "user successfully inserted";
    } else {
        echo "Deletion error" . $sql . mysqli_error($connection);
        die("Deletion Erro");
    }
}

function updateRoom($connection, $name, $price, $picture, $type, $id)
{
    if ($price) {
        $price = intval($price);
    }
    $room_data = getRoom($connection, $id);
    $room = $room_data->fetch_assoc();
    echo $room['picture'];
    $old_room_name = $room['room_name'];
    $old_room_price = $room['price'];
    $old_room_picture = $room['picture'];
    $old_room_type = $room['room_type'];
    $name_sql = $name === "" ? "room_name='$old_room_name'," : "room_name='$name',";
    $price_sql = $price === "" ? "price=$old_room_price," : "price=$price,";
    $picture_sql = $picture === "" ? "picture='$old_room_picture'," : "picture='$picture',";
    $type_sql = $type === "" ? "room_type='$old_room_type'" : "room_type='$type'";

    $sql = "UPDATE Rooms SET $name_sql $price_sql $picture_sql $type_sql WHERE id=$id";

    if (mysqli_query($connection, $sql)) {
        echo "Operation Successful";
    } else {
        echo "Something went wrong!";
        return;
    }

}