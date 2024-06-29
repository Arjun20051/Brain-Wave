<!DOCTYPE html>
<html lang="en">

<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>About Us</title>
    <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
    <!-- Bootstrap core CSS -->
    <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            background-color:white;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #c9dfff;
            color: #fff;
            padding: 20px;
            text-align: center;
            max-width: 1000px;
            /* Adjust the max-width as needed */
            margin: 0 auto;
            border-radius: 5px 5px 0 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 5px 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .vision-mission {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .vision-mission h2 {
            color: #333;
        }

        .vision-mission p {
            color: #666;
            line-height: 1.6;
        }

        .image-section {
            flex: 1;
            box-sizing: border-box;
            padding: 20px;
        }

        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
        }

        .logo {
            height: 70px;
            width: 90px;
            margin-right: 10px;
            margin-left: 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .nav-pills .nav-link {
            color: #000;
            /* Set the color for normal state */
        }

        .nav-pills .nav-link.active,
        .nav-pills .nav-link:hover {
            background-color: #0d6efd;
            /* Set the background color for active and hover states */
            color: #fff;
            /* Set the text color for active and hover states */
        }
    </style>
</head>

<body>
    <header class='d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom'>
        <a href='/' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>
            <img class='logo' src='logo.jpg'>
            <span class='fs-4'>BrainWave</span>
        </a>

        <ul class='nav nav-pills'>
            <li class='nav-item'><a href='course1.php' type='button' class='btn btn-outline-primary me-2'>My courses</a></li>
            <li class='nav-item'><a href='#' type='button' class='btn btn-outline-primary me-2'>FAQs</a></li>
            <li class='nav-item'><a href='aboutus.php' type='button' class='btn btn-outline-primary me-2'>About us</a></li>
            <li class='nav-item'><a href='logout.php' type='button' class='btn btn-outline-primary me-2'>Logout</a></li>
        </ul>
    </header>

    <div class="header">
        <h1>About Us</h1>
    </div>

    <div class="container">
        <div class="content">
            <div class="vision-mission">
                <!-- Continue from the existing content in the "Mission" section -->
<h2>Values</h2>
<p>Our values form the core of BrainWave. We are committed to fostering a culture of innovation, collaboration, and continuous improvement. Integrity, transparency, and a passion for knowledge drive us to deliver an unparalleled educational experience.</p>

<h2>Why Choose BrainWave?</h2>
<p>🌐 Global Reach:Connect with learners worldwide, breaking down geographical barriers.</p>
<p>🔍 Diverse Courses: Explore a vast array of courses, carefully curated to meet the demands of the digital age.</p>
<p>💡 Cutting-edge Technology: Immerse yourself in state-of-the-art tools and platforms designed for a seamless learning journey.</p>


                <h2>Vision</h2>
                <p>At Brainwave, our vision is to forge a world where knowledge and skills in various computer-related
                    disciplines, such as web design, Python programming, UI design, and more, are easily accessible to
                    everyone, irrespective of their background or resources. We aim to build a community where the
                    pursuit of learning becomes a shared endeavor, fostering inclusivity and empowerment through the
                    diverse realms of computer education.</p>
                <h2>Mission</h2>
                
                <p>Our mission at Brainwave is to establish an exceptional online educational platform that empowers
                    individuals to explore, learn, and master a broad spectrum of computer courses. We are dedicated to
                    providing high-quality lessons, cutting-edge tools, and an immersive learning experience crafted to
                    cater to both beginners and seasoned professionals alike.</p>
                <p>Through our unwavering commitment to excellence, inclusivity, and the transformative power of
                    education, we aspire to make a meaningful impact on the lives of our users. We seek to nurture their
                    passion for computer-related subjects, assisting them in unlocking their full potential and advancing
                    their skills in the ever-evolving landscape of technology.</p>
                    <h2>Join Us on this Exciting Voyage!</h2>
<p>Embark on a learning adventure like never before. Let BrainWave be your compass in the vast sea of knowledge. Sign up today and unlock the doors to a future shaped by your passion for learning!</p>

                </div>
            

            <div class="image-section">
<img src="aboutus.jpg">
<img src="vision.jpg">
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 Tech Titans. All rights reserved.</p>
    </div>
</body>

</html>