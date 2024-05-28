<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="Book one of the NightStar Hotel Sevices" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/stylesheets/service.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="assets/stylesheets/booking.css">
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <title>NightStars Booking page</title>
</head>

<body>
    <main>
        <?php if ($_SERVER['REQUEST_METHOD'] === "POST") {
            require "./controller/database/services.php";
            require "../controller/database/dbConnection.php";

            $room_id = $_POST['room_choice_id'];

            $room_data = getRoom($connection, $room_id);
            $room = $room_data->fetch_assoc();
            $room_name = $room['room_name'];
            $room_price = $room['price'];
            $room_picture = $room['picture'];

        } ?>
        <article class="room-form-container">
            <h1 align="center" class="booking-title">Update Room
            </h1>
            <form action="./controller/util/roomDBHelperU.php" method="POST" enctype="multipart/form-data"
                class="room-form" id="room-form">
                <input type="hidden" name="room_choice_id" value="<?php echo $room_id ?>">
                <div class="input-container">
                    <label for="room-name">Name</label>
                    <input type="text" id="room-name" name="room-name" value="<?php echo $room_name ?>"
                        placeholder="Enter room name" />
                </div>
                <div class="input-container">
                    <label for="room-price" class="room-price">Price</label>
                    <input type="number" id="room-price" value="<?php echo $room_price ?>" name="room-price" />
                </div>
                <div class="input-container">
                    <label for="room-picture" class="room-picture">Picture</label>
                    <input type="file" accept="image/*" id="room-picture" value="<?php echo $room_picture ?>"
                        name="room-picture" />
                </div>
                <div class="input-container">
                    <label for="room-type-select">Room Type</label>
                    <select form="room-form" name="room-type-select" id="room-type-select" class="room-type-select">
                        <option value="studio" selected>Studio</option>
                        <option value="suite">Suite</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="triple">Triple</option>
                    </select>
                </div>
                <input type="submit" value="Update Room" id="add-room-btn" />
                <form action="service-management.php">
                    <input type="submit" value="Go Back" id="add-room-btn">
                </form>
            </form>
        </article>
    </main>
    <script src="assets/scripts/booking-form-validation.js"></script>
    <script src="assets/scripts/booking-form-validation.js"></script>
    <script src="../global/scripts/header.js"></script>
</body>

</html>