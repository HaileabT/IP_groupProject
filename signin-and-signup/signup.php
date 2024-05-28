<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="Sign Up to NightStar Hotel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/stylesheets/signup.css" />
    <link rel="stylesheet" href="../global/stylesheets/global.css" />
    <link rel="stylesheet" href="../global/stylesheets/footer.css" />
    <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <script src="../global/scripts/header.js" defer></script>
    <script src="assets/scripts/sign.js" defer></script>
    <title>Sign up to become a customer</title>
</head>

<body>
    <main>
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
                            <a href="../contact-us/contact_us.php" id="head-contact-us-link" class="link">Contact
                                Us</a>
                        </li>
                        <li id="head-signup-list">
                            <a href="../signin-and-signup/signup.php" id="head-signup-link" class="link current">Sign
                                Up</a>
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
        <div class="all-signup-container">
            <form action="./controller/validator/signupValidator.php" method="POST" class="main-form-container" id="all-form-group">
                <h1 class="signup-text">Signup</h1>
                <?php if (isset($_GET["error"])) { ?>
                    <p class="error" style="color: red; text-align:center; font-size:14px;"><?php echo $_GET["error"] ?></p>
                <?php } ?>
                <fieldset class="main-personal-container">
                    <legend>Personal Info</legend>
                    <div class="personal-input-container" id="all-personal-input">
                        <div class="name-container">
                            <div class="first-name-container container">
                                <label for="first-name">First Name</label><br />
                                <div class="first-message-cont icon-cont">
                                    <input type="text" id="first-name" minlength="2" custommaxlength="10" required class="input" name="first-name" />
                                    <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                    <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                                </div>
                                <div class="Error-message"></div>
                            </div>
                            <div class="last-name-container container">
                                <label for="last-name">Last Name</label><br />
                                <div class="second-message-cont icon-cont">
                                    <input type="text" id="last-name" minlength="2" custommaxlength="10" required class="input" name="last-name" />
                                    <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                    <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                                </div>
                                <div class="Error-message"></div>
                            </div>
                        </div>
                        <div class="middle-name-container container">
                            <label for="middle-name">Middle Name</label>
                            <div class="middle-message-cont icon-cont">
                                <input type="text" id="middle-name" maxlength="30" class="input" minlength="2" custommaxlength="12" required name="middle-name" />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                        <div class="email-container container">
                            <label for="email">Email</label>
                            <div class="email-message-cont icon-cont">
                                <input type="email" name="email" id="email" required class="input" pattern="^(.+)@(.+)$" />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                        <div class="password-container container">
                            <label for="password">Password</label>
                            <div class="password-message-cont icon-cont">
                                <input type="password" name="password" id="password" minlength="8" custommaxlength="15" class="input" required autocomplete="password" />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                        <div class="conf-container container">
                            <label for="conf-password">Confirm Password</label>
                            <div class="conf-message-cont icon-cont">
                                <input type="password" name="conf-password" id="conf-password" minlength="8" custommaxlength="15" match="password" class="input" autocomplete="conf-password" required />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                        <div class="phone-container container">
                            <label for="tel">Phone Number</label>
                            <div class="phone-message-cont icon-cont">
                                <input type="tel" name="tel" id="tel" pattern="09[0-9]{8}" class="input" min="9" custommaxlength="10" required />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="main-payment-container" id="all-payment-input">
                    <legend>Payment</legend>
                    <div class="info-input-container">
                        <label for="bank">Bank</label><br />
                        <select name="bank" id="bank" class="input" required>
                            <option value="cbe" selected>
                                Commercial Bank of Ethiopia
                            </option>
                            <option value="boa">Bank of Abbysinia</option>
                            <option value="dashen">Dashen Bank</option>
                            <option value="oromia">Oromia Bank</option>
                        </select><br />
                        <div class="account-number-container container">
                            <label for="acc-no">Account Number</label><br />
                            <div class="account-message-cont icon-cont">
                                <input type="number" name="acc-no" id="acc-no" placeholder="1000888888888" class="input" required pattern="^\d{9,18}$" />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>
                    </div>
                </fieldset>
                <section class="foot-container">
                    <div class="checkbox-contianer">
                        <input type="checkbox" name="policy" id="policy" class="agreement-box" />
                        <label for="policy" class="check-note">
                            By checking this body you confirm that you agree with our terms
                            and conditions that has to do with your account information on
                            this website.
                        </label>
                    </div>
                    <div class="submit-container">
                        <input type="submit" value="Sign Up" class="submit" />
                    </div>
                </section>
            </form>
        </div>
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
                        <a href="../signin-and-signup/signin.php" class="link">Login</a>
                    </li>
                </ul>
            </nav>
            <p class="copywrite">&copy; NightStar Hotel</p>
        </footer>
    </main>
</body>

</html>