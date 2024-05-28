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
    echo $room_id;
    if ($room_id == -1) {
        header("Location: /booking/booking.php?error=You haven't chosen a room.");
    }
    $getBookings = "SELECT * FROM bookings";
    $allBookings = mysqli_query($connection, $getBookings);
    if ($allBookings instanceof mysqli_result) {

        while ($booking = mysqli_fetch_array($allBookings)) {
            $arrival = new DateTime($booking['arrival_date']);
            $input_arrival_date = DateTime::createFromFormat('Y-m-d H:i:s', $arrival_date);
            $departure = new DateTime($booking['departure_date']);
            $input_departure_date = DateTime::createFromFormat('Y-m-d H:i:s', $departure_date);
            // $date = $input_arrival_date->format('Y-m-d');


            if ($arrival <= $input_arrival_date && $departure >= $input_arrival_date) {
                header("Location: /booking/booking.php?error=Room already booked on those dates.");
                exit();
            }
            if ($arrival == $input_arrival_date || $departure == $input_arrival_date) {
                header("Location: /booking/booking.php?error=Room already booked on those dates.");
                exit();
            }
            if ($arrival <= $input_departure_date && $departure >= $input_departure_date) {
                header("Location: /booking/booking.php?error=Room already booked on those dates.");
                exit();
            }
            if ($arrival == $input_departure_date || $departure == $input_departure_date) {
                header("Location: /booking/booking.php?error=Room already booked on those dates.");
                exit();
            }

        }

        if ($booker_id === null) {
            $sql = "INSERT INTO Bookings (first_name,last_name,email, room_id, number_of_guests,arrival_date, departure_date) VALUES('$first_name','$last_name','$email', $room_id,$number_of_guests,'$arrival_date','$departure_date')";
        } else {
            $sql = "INSERT INTO Bookings (booker_id, room_id, number_of_guests, arrival_date, departure_date) VALUES($booker_id, $room_id, $number_of_guests, '$arrival_date', '$departure_date')";
        }
        if (mysqli_query($connection, $sql)) {
            //success code
            header("Location: /booking/booking.php?success=Booked successfully");
        } else {
            //error handler
            header("Location: /booking/booking.php?error=Internal Server Error");
        }

    } else {
        header("Location: /booking/booking.php?error=Internal Server Error.");
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