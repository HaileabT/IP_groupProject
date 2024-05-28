<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="login to NightStar Hotel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/stylesheets/signin.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <script src="assets/scripts/sign.js" defer></script>
    <title>Login</title>
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
                    <li id="head-about-us-list">
                        <a href="../about/about.php" id="head-about-us-link" class="link">About</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link">Contact Us</a>
                    </li>
                    <li id="head-signup-list">
                        <a href="../signin-and-signup/signup.php" id="head-signup-link" class="link">Sign Up</a>
                    </li>
                    <li id="head-login-list">
                        <a href="../signin-and-signup/signin.php" id="head-login-link" class="link current">Login</a>
                    </li>
                </ul>
            </nav>
            <button class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </header>

    <main>
        <div class="main-login-container">
            <h1 class="login-text">LOGIN</h1>

            <form action=".././signin-and-signup/controller/validator/signinValidator.php" method="POST"
                class="all-login-form-container" id="all-form-group">
                <?php if (isset($_GET["error"])) { ?>
                    <p class="error" style="color: red; text-align:center; font-size:14px;"><?php echo $_GET["error"] ?></p>
                <?php } ?>
                <div class="login-email-container container">
                    <label for="email">Email</label><br />
                    <div class="login-email-message-container icon-cont">
                        <input type="email" name="email" id="email" form="all-form-group" class="input" required
                            pattern="^(.+)@(.+)$" />
                        <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                        <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                    </div>
                    <div class="Error-message"></div>
                </div>
                <div class="login-password-container container">
                    <label for="password">Password</label><br />
                    <div class="login-pass-message-container icon-cont">
                        <input type="password" name="password" id="password" form="all-form-group"
                            autocomplete="password" class="input" minlength="8" custommaxlength="12" class="input"
                            required />
                        <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                        <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                    </div>
                    <div class="Error-message"></div>
                </div>
                <div class="login-container">
                    <input type="submit" name="login" value="LOGIN" class="login-btn" />
                </div>
            </form>
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
                <li class="footer-list-item">
                    <a href="../about/about.php" class="link">About</a>
                </li>
                <li class="footer-list-item">
                    <a href="../contact-us/contact_us.php" class="link">Contact Us</a>
                </li>
                <li class="footer-list-item">
                    <a href="#main-header" class="link">Back to Top</a>
                </li>
                <li class="footer-list-item">
                    <a href="../signin-and-signup/signup.php" class="link">Sign Up</a>
                </li>
            </ul>
        </nav>
        <p class="copywrite">&copy; NightStar Hotel</p>
    </footer>
    <script src="../global/scripts/header.js"></script>
    <?php error_reporting(E_ALL);
    ini_set('display_errors', 1); ?>

</body>

</html>