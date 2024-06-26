<?php
session_save_path('C:\xampp_sessions');
session_start();

if (isset($_SESSION["email"]) && isset($_SESSION["id"])) {
  include "../controller/database/dbConnection.php";
  $userId = $_SESSION["id"];
  $sql = "SELECT * FROM User WHERE id='$userId'";
  $userData = mysqli_fetch_array(mysqli_query($connection, $sql));
  $user_position = $userData['position'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="About the Hotel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About NightStar Hotel</title>
    <link rel="stylesheet" href="assets/stylesheet/about.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="assets/stylesheet/header.css" />
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <script src="../global/scripts/header.js" defer></script>
</head>

<body>
    <header id="main-header">
        <video src="../assets/videos/cinematic-hotel-video.mp4" autoplay muted loop class="header-bg-video"></video>
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
                    <?php if (isset($_SESSION['id']) && $user_position === 'admin') { ?>
                    <li id="head-contact-us-list">
                        <a href="../service_mangement/service-management.php" id="head-contact-us-link"
                            class="link">Services</a>
                    </li>
                    <?php } ?>
                    <li id="head-about-us-list">
                        <a href="../about/about.php" id="head-about-us-link" class="link current">About</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link">Contact Us</a>
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

        <div class="motto-container">
            <div class="motto-hotel-name">
                <h1>NIGHTSTAR HOTEL</h1>
            </div>
            <h1>OUR GOAL IS TO SERVE YOU, AND <span>SERVE YOU WELL</span>.</h1>
            <a href="booking/booking.html" class="call-to-action goto-booking">Book
                N ow <i class="fa-solid fa-square-arrow-up-right"></i></a>
        </div>
    </header>

    <main class="about-us-main-container">
        <div class="welcome-container">
            <div class="welcome-title-container">
                <h1 class="welcome-heading" id="Welcome to NightStar Hotel">
                    Welcome to NightStar Hotel<br />
                    A Celestial Haven of Luxury
                </h1>
            </div>
            <div class="welcome-text-container">
                <p class="some-overview1 background">
                    NightStar Hotel was founded in [year of establishment] with the
                    vision of providing an unparalleled hospitality experience to
                    travelers from around the world. Established by [founder's name],
                    the hotel quickly became synonymous with luxury, comfort, and
                    exceptional service.
                </p>
                <p class="some-overview2 background">
                    From its humble beginnings as a boutique hotel, NightStar has grown
                    into a prominent player in the hospitality industry. The hotel's
                    commitment to excellence and attention to detail has earned it a
                    reputation for being a preferred choice for both business and
                    leisure travelers.
                </p>
            </div>
        </div>
        <div class="mission-vision-container">
            <div class="mission-vission-desc">
                <h1 class="mission-vission-desc-title">
                    Our Missions, Visssions and Values will pull to success
                </h1>
            </div>
            <div class="inner-mission-vission-cont">
                <fieldset class="mission-container">
                    <legend class="mission-title">Mission</legend>
                    <p class="mission-description">
                        At NightStars Hotel, our mission is to redefine hospitality by
                        providing a haven of luxury where unparalleled service, meticulous
                        attention to detail, and a warm ambiance converge. We are
                        dedicated to exceeding our guests' expectations, creating
                        memorable experiences, and setting new standards in the art of
                        personalized hospitality.
                    </p>
                    <p class="mission-description2">
                        our differentiation lies in the artful fusion of opulence and
                        personalized care. We transcend conventional hospitality by
                        crafting an immersive experience where each guest is enveloped in
                        the warmth of distinctive luxury. From meticulous attention to
                        detail to an unwavering commitment to guest satisfaction.
                    </p>
                </fieldset>

                <fieldset class="vission-container">
                    <legend class="vission-title">Vision</legend>
                    <p class="vision-description1">
                        NightStars Hotel envisions becoming a beacon of timeless elegance
                        and exceptional service, where every guest encounter is a
                        celebration of sophistication. Our vision is to be recognized as
                        the premier destination that seamlessly blends luxury, innovation,
                        and heartfelt hospitality, leaving an indelible mark on the world
                        of distinctive travel experiences.
                    </p>
                    <p class="vision-description2">
                        we are committed to providing an inclusive and accessible
                        experience for all our guests. Our facilities and services are
                        designed to accommodate the diverse needs of our visitors,
                        ensuring that everyone can enjoy the luxurious offerings and warm
                        hospitality that define the NightStars experience.
                    </p>
                </fieldset>
            </div>
        </div>
        <div class="info-container">
            <div class="location-hour-container">
                <div class="hour-container info-c">
                    <h1 class="location-title info-title">Operation</h1>
                    <p class="location-description">
                        At NightStars Hotel, we are dedicated to providing exceptional
                        service around the clock. Our doors are open 24 hours a day, seven
                        days a week, ensuring that our guests can experience the warmth of
                        hospitality at any time. Whether you're arriving late or departing
                        early, our team is here to welcome you with the highest standards
                        of service and comfort.
                    </p>
                </div>

                <div class="address-container info-c">
                    <h1 class="location-title info-title">Address</h1>
                    <p class="active-hour-description">
                        Discover NightStars Hotel at the heart of Addis Ababa, nestled at
                        Bole road 78. Our urban oasis is conveniently located in the
                        vibrant Bole sub city, ensuring easy access to key attractions and
                        cultural gems. With the postal code 1000, NightStars Hotel stands
                        as a beacon of luxury and hospitality. Immerse yourself in the
                        allure of our refined accommodations and personalized service,
                        surrounded by the charm of our Addis Ababa setting.
                    </p>
                </div>
            </div>
        </div>

        <div class="team-container">
            <h1 class="team-tile">Teams</h1>
            <div class="team-box-holder">
                <div class="team1-leader-container team-box">
                    <img src="assets/images/nesredin.jpg" alt="Human Resources Team Leader's Photo"
                        class="team-leader-photo" />
                    <h3 class="team1-leader-name name-title">Yohannes Yibeltal</h3>
                    <div class="team-contact">
                        <p class="phone-no"><strong></strong>+251*********</p>
                    </div>
                    <p class="team1-leader-role role">Food and Beverage Team Leader</p>
                </div>

                <div class="team2-leader-container team-box">
                    <img src="assets/images/dagmawi.jpg" alt="Event Planning Team Leader's Photo"
                        class="team-leader-photo" />
                    <h3 class="team2-leader-name name-title">Dagmawi Sntayew</h3>
                    <div class="team-contact">
                        <p class="phone-no"><strong></strong>+251*********</p>
                    </div>
                    <p class="team2-leader-role role">Event Planning Team Leader</p>
                </div>

                <div class="team3-leader-container team-box">
                    <img src="assets/images/nesredin.jpg" alt="Human Resources Team Leader's Photo"
                        class="team-leader-photo" />
                    <h3 class="team3-leader-name name-title">Nesrdein Esayas</h3>
                    <div class="team-contact">
                        <p class="phone-no"><strong></strong>+251*********</p>
                    </div>
                    <p class="team3-leader-role role">Human Resources Team Leader</p>
                </div>

                <div class="team4-leader-container team-box">
                    <img src="assets/images/dagmawi.jpg" alt="Event Planning Team Leader's Photo"
                        class="team-leader-photo" />
                    <h3 class="team4-leader-name name-title">Girma Yitagesu</h3>
                    <div class="team-contact">
                        <p class="phone-no"><strong></strong>+251*********</p>
                    </div>
                    <p class="team4-leader-role role">
                        Sales and Marketing Team Leader
                    </p>
                </div>
            </div>
        </div>
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
</body>

</html>