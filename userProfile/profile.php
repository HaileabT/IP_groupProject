<?php
session_save_path('C:\xampp_sessions');
session_start();


if (isset($_SESSION["email"]) && isset($_SESSION["id"])) {
    include "../controller/database/dbConnection.php";
    $userId = $_SESSION["id"];
    $sql = "SELECT * FROM User WHERE id='$userId'";
    $userData = mysqli_fetch_array(mysqli_query($connection, $sql));
    $firstName = $userData["first_name"];
    $lastName = $userData["last_name"];
    $middleName = $userData["middle_name"];
    $accountNo = $userData["account_no"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Section B Group 8" />
        <meta name="description" content="login to NightStar Hotel" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../signin-and-signup/assets/stylesheets/signup.css" />
        <link rel="stylesheet" href="../global/stylesheets/footer.css" />
        <link rel="stylesheet" href="../global/stylesheets/global.css" />
        <link rel="stylesheet" href="../global/stylesheets/global-header.css" />
        <link rel="stylesheet" href="./assets/stylesheet/profile.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
        <script src="../signin-and-signup/assets/scripts/sign.js" defer></script>
        <script src="./assets/scripts/profile.js" defer></script>
        <title>Profile</title>
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
                            <a href=".././index.php" id="head-home-link" class="link">Home</a>
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
                        <li id="profile">
                            <div class="profile-container" style="color: white;">
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <h2><?php echo $_SESSION["first_name"] ?></h2>
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="#" id="edit-pro">Edit Profile</a>
                                        <a href="#" id="del-pro">Delete Account</a>
                                        <a href="#" id="logout">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div id="confirmationModal" class="modal">
                                <div class="modal-content">
                                    <p id="confirmationMessage"></p>
                                    <div class="modal-buttons">
                                        <a id="confirmYes">Yes</a>
                                        <a id="confirmNo">No</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </nav>
                <button class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>

            </div>

        </header>


        <div class="all-signup-container">
            <form action=".././signin-and-signup/controller/validator/editValidator.php" method="POST" class="main-form-container" id="all-form-group" style="display: none;">
                <h1 class="signup-text">Edit Profile</h1>
                <fieldset class="main-personal-container">
                    <legend>Personal Info</legend>
                    <div class="personal-input-container" id="all-personal-input">
                        <div class="name-container">
                            <div class="first-name-container container">
                                <label for="first-name">First Name</label><br />
                                <div class="first-message-cont icon-cont">
                                    <input type="text" id="first-name" minlength="2" value="<?php echo $firstName ?>" custommaxlength="10" required class="input" name="first-name" />
                                    <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                    <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                                </div>
                                <div class="Error-message"></div>
                            </div>
                            <div class="last-name-container container">
                                <label for="last-name">Last Name</label><br />
                                <div class="second-message-cont icon-cont">
                                    <input type="text" id="last-name" value="<?php echo $lastName ?>" minlength="2" custommaxlength="10" required class="input" name="last-name" />
                                    <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                    <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                                </div>
                                <div class="Error-message"></div>
                            </div>
                        </div>
                        <div class="middle-name-container container">
                            <label for="middle-name">Middle Name</label>
                            <div class="middle-message-cont icon-cont">
                                <input type="text" id="middle-name" value="<?php echo $middleName ?>" maxlength="30" class="input" minlength="2" custommaxlength="12" required name="middle-name" />
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
                                <input type="number" name="acc-no" value="<?php echo $accountNo ?>" id="acc-no" placeholder="1000888888888" class="input" required pattern="^\d{9,18}$" />
                                <span class="success-icon"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="fail-icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                            </div>
                            <div class="Error-message"></div>
                        </div>

                    </div>
                </fieldset>
                <div class="submit-container">
                    <input type="submit" id="save" value="Save changes" name="edit" class="submit" />
                    <a href="" id="cancel" value="Cancel changes" name="cancel" class="submit">cancel change</a>
                </div>
            </form>
        </div>
        <div class="profile-cont">
            <h1><?php echo htmlspecialchars($_SESSION["first_name"] . ' ' . $_SESSION["middle_name"] . ' ' . $_SESSION["last_name"]); ?>
            </h1>
            <p class="email"><?php echo htmlspecialchars($_SESSION["email"]); ?></p>
            <div class="separator"></div>
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
                </ul>
            </nav>
            <p class="copywrite">&copy; NightStar Hotel</p>
        </footer>
    </body>

    </html>
<?php
} else {
    header("location:./../signin-and-signup/signin.php");
    exit();
} ?>