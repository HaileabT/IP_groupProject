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
    <meta name="description" content="Contact NightStar Hotel through this page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/stylesheets/contact.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="../userProfile/assets/stylesheet/profile.css" />
    <script src="./../userProfile/assets/scripts/profile.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <title>Contact Us</title>
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
                        <a href="../booking/booking.php" id="head-booking-link" class="link">Book Now</a>
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
                        <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link current">Contact
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
        <section class="contact-us-form-container">
            <h1>Contact Us</h1>
            <form action="" method="post" class="contact-us-form">
                <fieldset>
                    <legend>Enter Your Info</legend>
                    <label for="name">Name</label>
                    <input type="text" placeholder=" Name" class="box" id="name" required />
                    <label for="email">Email</label>
                    <input type="email" placeholder=" Email" class="box" id="email" required />
                </fieldset>
                <label for="msg">Message</label>
                <textarea row="40" placeholder=" Message" class="box"></textarea>
                <input type="submit" value="Submit" id="submit-btn" />
            </form>
        </section>
    </main>
    <footer id="main-footer">
        <div class="logo-container footer-logo-container">
            <h1 class="logo">LOGO</h1>
        </div>

        <nav class="footer-nav-links">
            <ul>
                <li class="footer-list-item">
                    <a href="../index.html" class="link">Home</a>
                </li>
                <li class="footer-list-item">
                    <a href="../booking/booking.html" class="link">Booking</a>
                </li>
                <?php if (isset($_SESSION['id']) && $user_position === 'admin') { ?>
                <li class="footer-list-item">
                    <a href="../service_mangement/service-management.php" class="link">Services</a>
                </li>
                <?php } ?>
                <li class="footer-list-item">
                    <a href="../about/about.html" class="link">About</a>
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
    <script src="../global/scripts/header.js"></script>
</body>

</html>