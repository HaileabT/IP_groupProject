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
              <a href="../index.html" id="head-home-link" class="link">Home</a>
            </li>
            <li id="head-booking-list">
              <a href="booking.html" id="head-booking-link" class="link current">Book Now</a>
            </li>
            <li id="head-about-us-list">
              <a href="../about/about.html" id="head-about-us-link" class="link">About</a>
            </li>
            <li id="head-contact-us-list">
              <a href="../contact-us/contact_us.html" id="head-contact-us-link" class="link">Contact Us</a>
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
      </div>
      <div class="logo-and-nav-container fixed-header">
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
              <a href="booking.html" id="head-booking-link" class="link current">Book Now</a>
            </li>
            <li id="head-about-us-list">
              <a href="../about/about.html" id="head-about-us-link" class="link">About</a>
            </li>
            <li id="head-contact-us-list">
              <a href="../contact-us/contact_us.html" id="head-contact-us-link" class="link">Contact Us</a>
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
      <article class="booking-form-container">
        <h1 align="center" class="booking-title">
          Reserve Now for Unforgettable Moments at NightStars Hotel
        </h1>
        <form action="" class="booking-form" id="booking-form">
          <label for="booking-first-name booking-last-name">Name</label>
          <div class="name-container">
            <div class="input-container">
              <input type="" id="booking-first-name" placeholder="Enter first name" />
            </div>
            <div class="input-container">
              <input type="text" id="booking-last-name" placeholder="Enter last name" />
            </div>
          </div>
          <label for="booking-email" class="email-title">Email</label>
          <div class="input-container">
            <input type="email" id="booking-email" placeholder="myname@example.com" />
          </div>
          <label for="booking-room-type-title" class="room-type-title">Room type</label>
          <div class="input-container">
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
          </div>
          <label for="guest-number" id="guest-number-title">Number of Guests</label>
          <div class="input-container">
            <input type="number" value="0" />
          </div>
          <div>
            <div>
              <label for="booking-arrival-date" id="arrival-date-title">Arrival Date</label>
              <div class="input-container">
                <input type="date" class="booking-arrival-date" id="arrival-date" aria-placeholder="DD-MM-YY" />
              </div>
            </div>
            <div>
              <label for="booking-departure-date" id="departure-date-title">Departure Date</label>
              <div class="input-container">
                <input type="date" class="booking-departure-date" id="departure-date" aria-placeholder="DD-MM-YY" />
              </div>
            </div>
          </div>
          <label for="booking-pickup" id="pickup-title">
            <p>Free Pickup?</p>
            <section>
              <input type="radio" id="yes-pickup" value="" name="free-pickup" />
              <lable class="radio-label">Yes Please! - Pick me up on arrival</lable>
            </section>
            <section>
              <input type="radio" id="no-pickup" value="" name="free-pickup" />
              <lable class="radio-label">No Thanks - I'll make my own way there</lable>
            </section>
          </label>
          <label for="booking-flight-number" id="booking-flight-number-title">Flight Number</label>
          <div class="input-container">
            <input type="number" id="booking-flight-number" />
          </div>
          <label for="special-request" id="special-request-title">Special Request</label>
          <textarea name="" id="" cols="50" rows="4" id="special-request"></textarea>
          <input type="submit" value="Book" id="book-btn" />
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
            <a href="../index.html" class="link">Home</a>
          </li>
          <li class="footer-list-item">
            <a href="../about/about.html" class="link">About</a>
          </li>
          <li class="footer-list-item">
            <a href="../contact-us/contact_us.html" class="link">Contact Us</a>
          </li>
          <li class="footer-list-item">
            <a href="#main-header" class="link">Back to Top</a>
          </li>
          <li class="footer-list-item">
            <a href="../signin-and-signup/signup.php" class="link">Sign Up</a>
          </li>
          <li class="footer-list-item">
            <a href="../signin-and-signup/signin.php" class="link">Login</a>
          </li>
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