<?php
function bookingTableCreation($connection)
{
    $sql = "CREATE TABLE Bookings (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(30),
       last_name VARCHAR(50),
       email VARCHAR(50),
       booker_id INT UNSIGNED,
       room_id INT UNSIGNED,
       number_of_guests INT NOT NULL,
       arrival_date DATETIME NOT NULL,
       departure_date DATETIME NOT NULL,
       booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (booker_id) REFERENCES User(id) ON DELETE SET NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
    )";
    if ($connection->query($sql)) {
        echo "table created successfully";
    } else {
        echo "Error creating" . $connection->error;
    }
}
function insertBookingInfo($connection, string $first_name = "", string $last_name = "", string $email = "", $booker_id = null, $room_id, int $number_of_guests, $arrival_date, $departure_date)
{
    $error = "";
    if ($room_id === -1) {
        $error = "No room choosen";
    }
    if ($booker_id === null) {
        $sql = "INSERT INTO Bookings (first_name,last_name,email, room_id, number_of_guests,arrival_date, departure_date) VALUES('$first_name','$last_name','$email', $room_id,$number_of_guests,'$arrival_date','$departure_date')";
    } else {
        $sql = "INSERT INTO Bookings (booker_id, room_id, number_of_guests, arrival_date, departure_date) VALUES($booker_id, $room_id, $number_of_guests, '$arrival_date', '$departure_date')";
    }
    if (mysqli_query($connection, $sql)) {
        //success code
        header("Location: /booking/booking.php");
    } else {
        //error handler
        header("Location: /booking/booking.php");
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