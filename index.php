<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QR Code Attendance Management System.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- normalize css -->
    <link rel = "stylesheet" href = "resources/normalize.css">
    <!-- font -->
    <link rel = "stylesheet" href = "resources/font.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- magnific popup -->
    <link rel = "stylesheet" href = "resources/Magnific-Popup-master/dist/magnific-popup.css">
    <!-- owl carousel -->
    <link rel = "stylesheet" href = "resources/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel = "stylesheet" href = "resources/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <!-- animate css -->
    <link rel = "stylesheet" href = "resources/animate.css-main/animate.css">
    <!-- custom (main) css -->
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    
    <!-- header -->
    <header class="header" id="intro">
      <nav class="navbar">
        <div class="container">
          <div class="brand-and-toggler">
            <a class="navbar-brand">QR Code Attendance System</a>
            <button type="button" class="navbar-toggler" id="navbar-toggler">
              <i class="fas fa-bars"></i>
            </button>
          </div>

          <div class="navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="#home" class="nav-link">home</a>
              </li>
              <li class="nav-item">
                <a href="#feature" class="nav-link">feature</a>
              </li>
              <li class="nav-item">
                <a href="#demo" class="nav-link">View Demo</a>
              </li>
              <li class="nav-item">
                <a href="#testimonial" class="nav-link">testimonial</a>
              </li>
              <li class="nav-item">
                <a href="#contact" class="nav-link">contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="hero-div center container" id="home">
        <h1>Attendance Management System</h1>
        <p class="animate__animated animate__fadeInUp animate__slow">A system that scans QR code to mark attendance and sends an SMS alert to parent automatically.</p>

        <div class="hero-btns animate__animated animate__fadeInUp animate__slow">
          <a href="assets/QRcodedetails.pdf" class="btn-trans" style="background-color: transparent;"><button type="button" class="btn-trans">Learn more</button></a>
          <a href="#demo" class="btn-trans" style="background-color: transparent;"><button type="button" class="btn-white">View Demo</button></a>
        </div>
      </div>
    </header>
    <!-- end of header -->

    <!-- features section -->
    <section class="feature" id="feature">
      <div class="container">
        <div class="row">
          <div class="feature-left wow animate__animated animate__fadeInUp animate__slow">
            <img src="assets/after-removebg-preview.png" alt ="background image" width="20px" height="600px">
          </div>
          <div class="feature-right wow animate__animated animate__fadeInUp animate__slow">
            <div class="title">
              <h2>Explore the Features</h2>
              <p class="text">Wonder what our system entails? </p>
            </div>

            <div class="feature-item">
              <span><i class="fa fa-qrcode"></i></span>
              <div>
                <h3>QR Code</h3>
                <p class="text">With our system, we generate QR Code automatically during registration and have an in-built scanner to  mark attendance.</p>
              </div>
            </div>

            <div class="feature-item">
              <span><i class="fa fa-sms"></i></span>
              <div>
                <h3>SMS Alert</h3>
                <p class="text">With the use of SMS API, we are able to notify parents on student's arrival and departure in real time.</p>
              </div>
            </div>

            <div class="feature-item">
              <span><i class="fa fa-clock"></i></span>
              <div>
                <h3>Manual Attendance</h3>
                <p class="text">Whenever a student forgets his/her card, we can manually mark attendance with our system and send an SMS alert to parent.</p>
              </div>
            </div>

            <div class="feature-item">
              <span><i class="fa fa-info-circle"></i></span>
              <div>
                <h3>More Info...</h3>
                <p class="text">For more information, <a href="assets/QRcodedetails.pdf" style="color: skyblue;">Click here.</a></p>
              </div>
            </div>
            <div class="hero-btns animate__animated animate__fadeInUp animate__slow">
              <a href="#demo" class="btn-trans" style="background-color: transparent;"><button type="button" class="btn-white" style="background-color: green; color:white;">View Demo</button></a>
              <a href="qrcodeattendance/login.php" class="btn-trans" style="background-color: transparent;"><button type="button" class="btn-white" style="background-color: tomato; color:white; border: 3px solid tomato;">Launch Demo</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of features section -->

    <!-- sample video section -->
    <section class="video" id="demo">
      <div class="container">
        <a class="center popup-youtube" href="video/demo.webm">
          <i class="fas fa-play"></i>
        </a>
        <h2 class="wow animate__animated animate__fadeInUp animate__slow">Watch Demo Video</h2>
        <p class="wow animate__animated animate__fadeInUp animate__slow">A short clip to demonstrate your way around the system.</p>
      </div>
    </section>
    <!-- end of sample video section -->

    <!-- testimonial section -->
    <section class="testimonial" id="testimonial">
      <div class="container">
        <div class="title">
          <h2 class="wow animate__animated animate__bounceIn animate__slow">Happy Users</h2>
          <p class="text">Some few happy users of our system</p>
        </div>

        <div class="row owl-carousel owl-theme wow animate__animated animate__fadeInUp animate__slow">
          <div class="testimonial-item">
            <div class="testimonial-img">
              <img src="assets/avhs.jpg" alt="avhs">
            </div>
            <p>The system is very responsive and easy to use. Highly recommend it!</p>
            <span>Mr. Mshimu, Principal</span>
          </div>

          <div class="testimonial-item">
            <div class="testimonial-img">
              <img src="assets/emobilis.jpg" alt="emobilis">
            </div>
            <p>Great tool for automatic attendance, improvement noted from its launch in our school</p>
            <span>Mr. Michael, Lecture</span>
          </div>

          <div class="testimonial-item">
            <div class="testimonial-img">
              <img src="assets/kabu.jpg" alt="kabu">
            </div>
            <p>Looking for an alternative to paperwork attendance, highly recommend this sytem</p>
            <span>Mdm. Laura, Lecture</span>
          </div>
        </div>
      </div>
    </section>
    <!-- end of testimonial section -->

    <!-- contact section -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="title">
          <h2 class="wow animate__animated animate__bounceIn animate__slow">Keep in Touch</h2>
        </div>

        <div class="row wow animate__animated animate__fadeInUp animate__slow">
          <div class="contact-left">
            <h2>Text us Here</h2>
            <form>
              <input type="text" class="form-control" placeholder="Name">
              <input type="email" class="form-control" placeholder="Email">
              <textarea placeholder="Message" rows="6"></textarea>
              <button type="submit" class="submit-btn" style="background-color: green;">Send Now</button>
            </form>
          </div>

          <div class="contact-right">
            <div>
              <h2>Visit Office</h2>
              <p class="text">P.O.Box 81738 - 80100 Makadara, Mombasa</p>
            </div>
            <div>
              <h2>Call Us</h2>
              <p class="text">(+254) 748 370 216</p>
            </div>
            <div>
              <h2>Send Email</h2>
              <p class="text">rashidadamjee879@gmail.com</p>
              <button type="submit" class="submit-btn" style="background-color: skyblue;"><a href="https://goo.gl/maps/uA58SNp9RV6AWLr96" style="color: #fff;">Locate Us</a></button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of contact section -->

    <!-- footer -->
    <footer class="footer center">
      <div class="container">
        <p class="text">Copyright &copy; Adam Rashid</p>
      </div>
    </footer>
    <!-- end of footer -->






    <!-- jQuery -->
    <script src = "resources/jquery-3.5.1.js"></script>
    <!-- magnific popup -->
    <script src = "resources/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
    <!-- owl carousel -->
    <script src = "resources/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <!-- wow js -->
    <script src = "resources/WOW-master/dist/wow.js"></script>
    <!-- custom js -->
    <script src="js/script.js" ></script>
  </body>
</html>