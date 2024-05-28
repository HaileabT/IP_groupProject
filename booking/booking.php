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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="Book one of the NightStar Hotel Sevices" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/stylesheets/booking.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <title>NightStars Booking page</title>
</head>

<body>
    </head>

    <body>
        <header id="main-header">
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
                            <a href="../booking/booking.php" id="head-booking-link" class="link current">Book Now</a>
                        </li>
                        <?php if (isset($_SESSION['id']) && $user_position === 'admin') { ?>
                            <li id="head-contact-us-list">
                                <a href="../service_mangement/service-management.php" id="head-contact-us-link"
                                    class="link">Services</a>
                            </li>
                        <?php } ?>
                        <li id="head-about-us-list">
                            <a href="../about/about.php" id="head-about-us-link" class="link">About</a>
                        </li>
                        <li id="head-contact-us-list">
                            <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link">Contact
                                Us</a>
                        </li>
                        <?php if (empty($_SESSION['id'])) { ?>

                            <li id="head-signup-list">
                                <a href="../signin-and-signup/signup.php" id="head-signup-link" class="link">Sign Up</a>
                            </li>
                            <li id="head-login-list">
                                <a href="../signin-and-signup/signin.php" id="head-login-link" class="link">Login</a>
                            </li>

                        <?php } else { ?>

                            <li id="head-profile-list">
                                <a href="../userProfile/profile.php" id="head-contact-us-link" class="link">Profile</a>
                            </li>

                        <?php } ?>
                    </ul>
                </nav>
                <button class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </header>


        <main>
            <article class="booking-filter-container">
                <?php if (isset($_GET['error'])) { ?>
                    <h2 class="err-msg"><?php echo $_GET['error'] ?></h2>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <h2 class="success-msg"><?php echo $_GET['success'] ?></h2>
                <?php } ?>
                <h1 align="center" class="booking-title">
                    Reserve Now for Unforgettable Moments at NightStars Hotel
                </h1>
                <div class="rooms-query-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET"
                        class="booking-form" id="room-form">
                        <?php $search_value = !isset($_GET['search-tab']) ? "" : $_GET['search-tab'];
                        $search_tab_value = $search_value === "" ? "" : "value=$search_value";
                        ?>
                        <div class="input-container">
                            <label for="search-tab">Search</label>
                            <input type="text" form="room-form" name="search-tab" <?php echo $search_tab_value ?>
                                id="search-tab">
                        </div>
                        <div class="output-customization">
                            <div class="input-container">
                                <label for="room-sorting">Sort By</label>
                                <select form="room-form" name="room-sorting" id="room-sorting" class="room-sorting">
                                    <option value="room_name" selected>Default (Name)</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                            <div class="input-container">
                                <label for="room-type-select">Room Type</label>
                                <select form="room-form" name="room-type-select" id="room-type-select"
                                    class="room-type-select">
                                    <option value="" selected disabled>Select any room type</option>
                                    <option value="studio">Studio</option>
                                    <option value="suite">Suite</option>
                                    <option value="deluxe">Deluxe</option>
                                    <option value="triple">Triple</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Search" form="room-form" id="search-room-btn">
                    </form>
                </div>
                <?php
                require "./controller/database/bookingInfo.php";
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
                    $self = $_SERVER['PHP_SELF'];
                    $room_id_db = $row['id'];
                    $disabled = array_key_exists("room-book-btn$room_id_db", $_GET) ? "disabled" : "";
                    if ($room_choice === -1) {
                        $room_choice = $disabled === "" ? -1 : $room_id_db;
                    }
                    //        $php_self = "<?php echo htmlspecialchars($self)
                    echo "<li class='room-list-item'>";
                    echo "<img class='room-list-img' alt='$room_name_db' src='$room_pic_db' title='$room_name_db'/>";
                    echo " <div class='room-details-container'>";
                    echo "<div>";
                    echo "<h3 class='room-list-name'>$room_name_db</h3>";
                    echo "<p class='room-list-type'>$room_type_db</p>";
                    echo "</div>";
                    echo "<form action='/booking/booking.php'>";
                    echo "<input type='hidden' name='search-tab' value='$room_name' />";
                    echo "<input type='hidden' name='room_sorting' value='$room_sort' />";
                    echo "<input type='hidden' name='room-type-select' value='$room_type' />";
                    echo "<input type='hidden' name='room-list-page' value='$page' />";
                    echo "<input type='submit' name='room-book-btn$room_id_db' value='$$room_price_db' class='room-select book-btn'
                        $disabled>";
                    echo "</form>";
                    echo "</div>";
                    echo "</li>";
                }
                echo '</ul>'
                    ?>
            </article>

            <article class="booking-form-container">
                <form action="/booking/controller/validator/bookingValidator.php" method="POST" class="booking-form"
                    id="booking-form">
                    <?php
                    if ($GLOBALS['room_choice'] != -1) {
                    } else {
                        echo "<span class='choose-room-error'>Please make sure to choose a room</span>";
                    }
                    ?>
                    <input type="hidden" form="booking-form" name="room_choice_id" value="<?php echo $room_choice ?>" />

                    <?php if (!isset($_SESSION['id'])) { ?>
                        <label for="booking-first-name booking-last-name">Name</label>
                        <div class="name-container">
                            <div class="input-container">
                                <input type="" name="first-name" form="booking-form" id="booking-first-name"
                                    placeholder="Enter first name" />
                            </div>
                            <div class="input-container">
                                <input type="text" name="last-name" form="booking-form" id="booking-last-name"
                                    placeholder="Enter last name" />
                            </div>
                        </div>
                        <label for="booking-email" class="email-title">Email</label>
                        <div class="input-container">
                            <input type="email" id="booking-email" form="booking-form" name="email"
                                placeholder="myname@example.com" />
                        </div>
                    <?php } else { ?>

                        <p>Hi <?php echo $user_name ?></p>
                        <input type="hidden" form="booking-form" name="user" value="<?php echo $userId ?>" />
                    <?php } ?>
                    <!-- <label for="booking-room-type-title" class="room-type-title">Room type</label> -->
                    <!-- <div class="input-container">
                        <select name="" id="booking-room-type-title" aria-placeholder="Please Select">
                            <option value="" selected>Please Select</option>
                            <option value="std-room-1-2">Standard Room(1 to 2 People)</option>
                            <option value="family-room-2-4">Fmily Room(2 to 4 People)</option>
                            <option value="p-room-1-3">Private Room(1 to 3 People)</option>
                            <option value="md-room-6">Mix Dorm Room(6 People)</option>
                            <option value="female-d-room-6">
                                Female Dorm Room(6 People)
                            </option>
                            <option value="male-d-room-6">Male Dorm Room(6 People)</option>
                        </select>
                    </div> -->
                    <label for="guest-number" id="guest-number-title">Number of Guests</label>
                    <div class="input-container">
                        <input type="number" value="0" form="booking-form" name="number-of-guests" />
                    </div>
                    <div>
                        <div>
                            <label for="booking-arrival-date" id="arrival-date-title">Arrival Date</label>
                            <div class="input-container">
                                <input type="date" class="booking-arrival-date" form="booking-form" name="arrival-date"
                                    id="arrival-date" aria-placeholder="DD-MM-YY" />
                            </div>
                        </div>
                        <div>
                            <label for="booking-departure-date" id="departure-date-title">Departure
                                Date</label>
                            <div class="input-container">
                                <input type="date" class="booking-departure-date" name="departure-date"
                                    form="booking-form" id="departure-date" aria-placeholder="DD-MM-YY" />
                            </div>
                        </div>
                    </div>
                    <!-- <label for="special-request" id="special-request-title">Special Request</label>
                    <textarea name="" id="" cols="50" rows="4" id="special-request"></textarea> -->
                    <input type="submit" form="booking-form" value="Book" id="book-btn" />
                </form>
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
                        <a href="../about//about.php" class="link">About</a>
                    </li>
                    <?php if (isset($_SESSION['id']) && $user_position === 'admin') { ?>
                        <li class="footer-list-item">
                            <a href="../service_mangement/service-management.php" class="link">Services</a>
                        </li>
                    <?php } ?>
                    <li class="footer-list-item">
                        <a href="../contact-us/contact_us.php" class="link">Contact Us</a>
                    </li>
                    <li class="footer-list-item">
                        <a href="#main-header" class="link">Back to Top</a>
                    </li>
                    <?php if (empty($_SESSION['id'])) { ?>
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
</body>

</html>