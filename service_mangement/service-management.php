<?php
session_save_path('C:\xampp_sessions');
session_start();

if (isset($_SESSION["email"]) && isset($_SESSION["id"])) {
    include "../controller/database/dbConnection.php";
    $userId = $_SESSION["id"];
    $sql = "SELECT * FROM User WHERE id='$userId'";
    $userData = mysqli_fetch_array(mysqli_query($connection, $sql));
    $user_position = $userData['position'];
    $user_name = $userData['first_name'];
} ?>
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
    <header id="main-header">
        <!-- <div class="logo-and-nav-container fixed-header">
            <div class="logo-container header-logo-container">
                <h1 class="logo">LOGO</h1>
                <p class="hotel-name header-hotel-name">NightStar Hotel</p>
            </div>
            <nav id="primary-nav">
                <ul type="none" class="nav-ul header-links-nav-ul">
                    <li id="head-home-list">
                        <a href="../index.html" id="head-home-link" class="link">Home</a>
                    </li>
                    <li id="head-booking-list">
                        <a href="../booking/booking.php" id="head-booking-link" class="link">Book Now</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../service-mangement/service-management.php" id="head-contact-us-link"
                            class="link current">Service Management</a>
                    </li>
                    <li id="head-about-us-list">
                        <a href="../about/about.html" id="head-about-us-link" class="link">About</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../contact-us/contact_us.html" id="head-contact-us-link" class="link">Contact
                            Us</a>
                    </li>
                    <li id="head-signup-list">
                        <a href="../signin-and-signup/signup.html" id="head-signup-link" class="link">Sign Up</a>
                    </li>
                    <li id="head-login-list">
                        <a href="../signin-and-signup/signin.html" id="head-login-link" class="link">Login</a>
                    </li>
                </ul>
            </nav>
            <button class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div> -->
        <div class="logo-and-nav-container fixed-header">
            <div class="logo-container header-logo-container">
                <h1 class="logo">LOGO</h1>
                <p class="hotel-name header-hotel-name">NightStar Hotel</p>
            </div>
            <nav id="primary-nav">
                <ul type="none" class="nav-ul header-links-nav-ul">
                    <li id="head-home-list">
                        <a href="../index.php" id="head-home-link" class="link">Home</a>
                    </li>
                    <li id="head-booking-list">
                        <a href="../booking/booking.php" id="head-booking-link" class="link">Book Now</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../service_mangement/service-management.php" id="head-contact-us-link"
                            class="link current">Services</a>
                    </li>
                    <li id="head-about-us-list">
                        <a href="../about/about.php" id="head-about-us-link" class="link">About</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link">Contact
                            Us</a>
                    </li>
                    <li id="head-signup-list">
                        <a href="../signin-and-signup/signup.php" id="head-signup-link" class="link">Sign Up</a>
                    </li>
                    <li id="head-login-list">
                        <a href="../signin-and-signup/signin.php" id="head-login-link" class="link">Login</a>
                    </li>
                </ul>
            </nav>
            <button class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </header>

    <main>
        <article class="room-form-container">
            <h1 align="center" class="booking-title">
                Add a Room
            </h1>
            <?php if (isset($_GET['error'])) { ?>
            <h2 class="err-msg"><?php echo $_GET['error'] ?></h2>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
            <h2 class="success-msg"><?php echo $_GET['success'] ?></h2>
            <?php } ?>
            <form action="./controller/validator/servicesValidator.php" method="POST" enctype="multipart/form-data"
                class="room-form" id="room-form">
                <div class="input-container">
                    <label for="room-name">Name</label>
                    <input type="text" id="room-name" name="room-name" placeholder="Enter room name" />
                </div>
                <div class="input-container">
                    <label for="room-price" class="room-price">Price</label>
                    <input type="number" id="room-price" name="room-price" />
                </div>
                <div class="input-container">
                    <label for="room-picture" class="room-picture">Picture</label>
                    <input type="file" accept="image/*" id="room-picture" name="room-picture" />
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
                <input type="submit" value="Add Room" id="add-room-btn" />
            </form>
        </article>


        <article class="booking-filter-container">
            <h1 align="center" class="booking-title">
                Rooms Dashboard
            </h1>
            <div class="rooms-query-container">
                <form action="/service_mangement/service-management.php" method="GET" class="booking-form"
                    id="room-form-search">
                    <?php $search_value = !isset($_GET['search-tab']) ? "" : $_GET['search-tab'];
                    $search_tab_value = $search_value === "" ? "" : "value=$search_value";
                    ?>
                    <div class="input-container">
                        <label for="search-tab">Search</label>
                        <input type="text" form="room-form-search" name="search-tab" <?php echo $search_tab_value ?>
                            id="search-tab">
                    </div>
                    <div class="output-customization">
                        <div class="input-container">
                            <label for="room-sorting">Sort By</label>
                            <select form="room-form-search" name="room-sorting" id="room-sorting" class="room-sorting">
                                <option value="room_name" selected>Default (Name)</option>
                                <option value="price">Price</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="room-type-select">Room Type</label>
                            <select form="room-form-search" name="room-type-select" id="room-type-select"
                                class="room-type-select">
                                <option value="" selected disabled>Select any room type</option>
                                <option value="studio">Studio</option>
                                <option value="suite">Suite</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="triple">Triple</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Search" form="room-form-search" id="search-room-btn">
                </form>
            </div>
            <?php
            require "../booking/controller/database/bookingInfo.php";
            require "../controller/database/dbConnection.php";
            $room_name = "";
            $room_type = "";
            $room_sort = "";
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                if (!isset($_GET['search-tab']))
                    $_GET['search-tab'] = "";
                if (!isset($_GET['room-sorting']))
                    $_GET['room-sorting'] = "";
                if (!isset($_GET['room-type-select']))
                    $_GET['room-type-select'] = "";
                $room_name = stripslashes(htmlspecialchars(trim($_GET['search-tab'])));
                $room_sort = stripslashes(htmlspecialchars(trim($_GET['room-sorting'])));
                $room_type = stripslashes(htmlspecialchars(trim($_GET['room-type-select'])));
            }
            if (!isset($_GET['room-list-page'])) {
                $_GET['room-list-page'] = 1;

            }
            $page = intval($_GET['room-list-page']);
            $rooms = getAllRooms($connection, $room_name, (($page - 1) * 10), 10, $room_sort, $room_type);
            echo '<ul class="room-list-container">';
            $room_choice = -1;
            while ($row = $rooms->fetch_assoc()) {
                $room_name_db = $row['room_name'];
                $room_pic_db = $row['picture'];
                $room_type_db = $row['room_type'];
                $room_price_db = $row['price'];
                $room_id_db = $row['id'];
                //        $php_self = "<?php echo htmlspecialchars($self)
                echo "<li class='room-list-item'>";
                echo "<img class='room-list-img' alt='$room_name_db' src='$room_pic_db' title='$room_name_db'/>";
                echo " <div class='room-details-container'>";
                echo "<div>";
                echo "<h3 class='room-list-name'>$room_name_db</h3>";
                echo "<h3 class='room-name'>Price: $$room_price_db</h3>";
                echo "<p class='room-list-type'>$room_type_db</p>";
                echo "</div>";
                echo "<div class='btns-container'>";
                echo "<form action='service_update_page.php' method='POST'>";
                echo "<input type='hidden' name='room_choice_id' value='$room_id_db' />";
                echo "<input type='hidden' name='room-list-page' value='$page' />";
                echo "<input type='submit' name='room-book-btn$room_id_db' value='Edit Room' class='room-select book-btn'>";
                echo "</form>";
                echo "<form action='controller/util/roomDBHelperD.php' method='POST'>";
                echo "<input type='hidden' name='room_choice_id' value='$room_id_db' />";
                echo "<input type='hidden' name='room-list-page' value='$page' />";
                echo "<input type='submit' name='room-book-btn$room_id_db' value='Remove' class='room-select book-btn danger-btn'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</li>";
            }
            echo '</ul>'
                ?>
        </article>

    </main>

    <footer id="main-footer">
        <div class="logo-container footer-logo-container">
            <h1 class="logo">LOGO</h1>
        </div>

        <nav class="footer-nav-links">
            <ul>
                <li class="footer-list-item">
                    <a href="../index.php" class="link">Home</a>
                </li>
                <li class="footer-list-item">
                    <a href="../booking/booking.php" class="link">Booking</a>
                </li>
                <li class="footer-list-item">
                    <a href="../about/about.php" class="link">About</a>`
                </li>
                <li class="footer-list-item">
                    <a href="../contact-us/contact_us.php" class="link">Contact Us</a>
                </li>
                <li class="footer-list-item">
                    <a href="#main-header" class="link">Back to Top</a>
                </li>
                <?php if (!isset($_SESSION['id'])) { ?>
                <li class="footer-list-item">
                    <a href="../signin-and-signup/signup.php" class="link">Sign Up</a>
                </li>
                <li class="footer-list-item">
                    <a href="../signin-and-signup/signin.php" class="link">Login</a>
                </li>
                <?php } else { ?>
                <li class="footer-list-item">
                    <a href="../userProfile/profile.php" class="link">Profile</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <p class="copywrite">&copy; NightStar Hotel</p>
    </footer>
    <script src="assets/scripts/booking-form-validation.js"></script>
    <script src="assets/scripts/booking-form-validation.js"></script>
    <script src="../global/scripts/header.js"></script>
</body>

</html>