<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Section B Group 8" />
    <meta name="description" content="NightStar Hotel Landing Page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/stylesheets/header.css" />
    <link rel="stylesheet" href="assets/stylesheets/main.css" />
    <link rel="stylesheet" href="global/stylesheets/footer.css" />
    <link rel="stylesheet" href="global/stylesheets/global.css" />
    <link rel="stylesheet" href="global/stylesheets/global-header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <title>NightStar Hotel</title>
</head>

<body>
    <header id="main-header">
        <video src="assets/videos/cinematic-hotel-video.mp4" autoplay muted loop class="header-bg-video"></video>
        <div class="logo-and-nav-container fixed-header">
            <div class="logo-container header-logo-container">
                <h1 class="logo">LOGO</h1>
                <p class="hotel-name header-hotel-name">NightStar Hotel</p>
            </div>
            <nav id="primary-nav">
                <ul type="none" class="nav-ul header-links-nav-ul">
                    <li id="head-home-list">
                        <a href="index.php" id="head-home-link" class="link current">Home</a>
                    </li>
                    <li id="head-booking-list">
                        <a href="booking/booking.html" id="head-booking-link" class="link">Book Now</a>
                    </li>
                    <li id="head-about-us-list">
                        <a href="about/about.html" id="head-about-us-link" class="link">About</a>
                    </li>
                    <li id="head-contact-us-list">
                        <a href="contact-us/contact_us.html" id="head-contact-us-link" class="link">Contact Us</a>
                    </li>
                    <li id="head-signup-list">
                        <a href="signin-and-signup/signup.php" id="head-signup-link" class="link">Sign Up</a>
                    </li>
                    <li id="head-login-list">
                        <a href="signin-and-signup/signin.php" id="head-login-link" class="link">Login</a>
                    </li>
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
            <a href="booking/booking.html" class="call-to-action goto-booking">Book Now <i
                    class="fa-solid fa-square-arrow-up-right"></i></a>
        </div>
        <div class="credits">
            <h2>
                SECTION B GROUP 8, 3RD YEAR <span>SWENG</span>, <span>AASTU</span>
            </h2>
            <p class="small-para">
                Members <span>Haileab Tesfaye</span>, <span>Ephrem Mandefro</span>,
                <span>Haileyesus Asrat</span>, <span>Eyoel Tedla</span>,
                <span>Estifanos Zinabu</span> and <span>Henok Tademe</span>
            </p>
        </div>
    </header>
    <main id="page-main">
        <section id="speciality-section">
            <div>
                <h2>
                    Book one of our rooms to sleep next to the <span>best view</span> in
                    the city.
                </h2>
                <p>
                    Reserve a room with us and immerse yourself in the city's
                    breathtaking panorama as you indulge in a restful slumber beside the
                    best view. Elevate your stay with the allure of our unparalleled
                    vistas, ensuring a night of tranquility and urban enchantment.
                </p>
            </div>
            <div>
                <img src="assets/images/city_view_room.jpg" alt="Room with beautiful city view"
                    title="One of our rooms with the best city view" width="100%" />
            </div>
        </section>
        <section id="about-us-section">
            <article class="about-us-sec-article">
                <h3>Our Story</h3>
                <p>
                    Established in 2022, NightStar Hotel was born from a vision to
                    create an urban sanctuary that marries modern luxury with the
                    vibrancy of city life. Each chapter of our story is written with a
                    commitment to providing guests with an extraordinary experience,
                    making every visit memorable.
                </p>
            </article>
            <article class="about-us-sec-article">
                <h3>We are Different</h3>
                <p>
                    At NightStar Hotel, we pride ourselves on being more than just a
                    place to rest. We're a beacon of hospitality, offering a fusion of
                    contemporary elegance and personalized service. From the moment you
                    step through our doors, you become a part of our narrative—a story
                    woven with attention to detail, warmth, and a genuine desire to
                    exceed expectations.
                </p>
            </article>
            <article class="about-us-sec-article">
                <h3>Eye Catching Views</h3>
                <p>
                    Perched at the heart of the city, NightStar Hotel boasts the best
                    panoramic views. Our rooms are designed to showcase the city's
                    skyline, ensuring that every guest experiences the breathtaking
                    allure of the ciry from the comfort of their room. In addition to
                    our remarkable views, NightStar Hotel offers a diverse range of
                    amenities. Indulge in a culinary journey with our selection of
                    domestic and foreign meals, rejuvenate in our state-of-the-art gyms,
                    or unwind by the pools—the options are as varied as your
                    preferences. And the best part? Our commitment to affordability
                    means you can enjoy all these luxuries without breaking the bank.
                </p>
            </article>
        </section>
        <section id="accomodations">
            <article>
                <div class="accomodation-desc">
                    <h3>Deluxe Rooms</h3>
                    <p>
                        Elegance meets modern convenience in our Deluxe Rooms. With chic
                        decor, plush furnishings, and panoramic city views, these rooms
                        are designed for those seeking a touch of luxury during their
                        stay.
                    </p>
                </div>
                <div class="room-img-container-f">
                    <img width="100%" src="assets/images/deluxe-bedroom.jpg" alt="Deluxe Bedroom" loading="lazy"
                        title="Deluxe Room 401" />
                </div>
                <div class="room-img-container-l">
                    <img width="100%" src="assets/images/deluxe-bedroom2.jpg" alt="Deluxe Bedroom" loading="lazy"
                        title="Deluxe Room 402" />
                </div>
            </article>
            <article>
                <div class="accomodation-desc">
                    <h3>Executive Suites</h3>
                    <p>
                        Experience refined living in our spacious Executive Suites.
                        Perfect for business travelers or those seeking extra space, these
                        suites offer a harmonious blend of comfort and sophistication.
                    </p>
                </div>
                <div class="room-img-container-f">
                    <img width="100%" src="assets/images/executive-suite.jpg" alt="Executive Suite Bedroom"
                        loading="lazy" title="Executive Suite Room 406" />
                </div>
                <div class="room-img-container-l">
                    <img width="100%" src="assets/images/executive-suite2.jpg" alt="Executive Suite Bedroom"
                        loading="lazy" title="Executive Suite Room 407" />
                </div>
            </article>
            <article class="in-room-services-art">
                <h3>In-room Services</h3>
                <p>
                    Regardless of the room type you choose, NightStar Hotel is committed
                    to providing a range of amenities, including, Complimentary Wi-Fi,
                    Flat-screen TVs with premium channels, Cozy bedding for a restful
                    sleep, Modern and well-equipped bathrooms, In-room dining for your
                    convenience. <br />Explore our accommodations and find the perfect
                    space to make your stay at NightStar Hotel truly exceptional
                </p>
            </article>
        </section>
        <section id="services-provided">
            <article class="ser-art">
                <i class="fa-solid fa-utensils ser-icon"></i>
                <p class="ser-p">Good food. Good service.</p>
            </article>
            <article class="ser-art">
                <i class="fa-solid fa-bed ser-icon"></i>
                <p class="ser-p">Sleep well in our comfy bedrooms.</p>
            </article>
            <article class="ser-art">
                <i class="fa-solid fa-person-swimming ser-icon"></i>
                <p class="ser-p">Beautiful Swimming pools.</p>
            </article>
            <article class="ser-art">
                <i class="fa-solid fa-dumbbell ser-icon"></i>
                <p class="ser-p">Complete gyms for your workouts.</p>
            </article>
            <article class="ser-art">
                <i class="fa-solid fa-handshake ser-icon"></i>
                <p class="ser-p">Hold your meetings here.</p>
            </article>
        </section>
    </main>
    <footer id="main-footer">
        <div class="logo-container footer-logo-container">
            <h1 class="logo">LOGO</h1>
        </div>

        <nav class="footer-nav-links">
            <ul>
                <li class="footer-list-item">
                    <a href="booking/booking.html" class="link">Booking</a>
                </li>
                <li class="footer-list-item">
                    <a href="about/about.html" class="link">About</a>
                </li>
                <li class="footer-list-item">
                    <a href="contact-us/contact_us.html" class="link">Contact Us</a>
                </li>
                <li class="footer-list-item">
                    <a href="#main-header" class="link">Back to Top</a>
                </li>
                <li class="footer-list-item">
                    <a href="signin-and-signup/signup.php" class="link">Sign Up</a>
                </li>
                <li class="footer-list-item">
                    <a href="signin-and-signup/signin.php" class="link">Login</a>
                </li>
            </ul>
        </nav>
        <p class="copywrite">&copy; NightStar Hotel</p>
    </footer>
    <script src="global/scripts/header.js"></script>
</body>

</html>