<!DOCTYPE html>
<html lang="en">

<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>BrainWave - Home</title>
    <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
    <!-- Bootstrap core CSS -->
    <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #c9dfff;
            color: #fff;
            padding: 20px;
            text-align: center;
            max-width: 1000px;
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

        .button-section {
            flex: 1;
            box-sizing: border-box;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-section a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .right-section {
            flex: 1;
            box-sizing: border-box;
            padding: 20px;
        }

        .right-section img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
        }

        .social-media-icons {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-media-icons a {
            margin: 0 10px;
            text-decoration: none;
        }

        .social-media-icons img {
            height: 30px;
            width: 30px;
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
            <li class='nav-item'><a href='signup.php' type='button' class='btn btn-outline-primary me-2 btn-sm'>Sign Up</a></li>
            <li class='nav-item'><a href='login.php' type='button' class='btn btn-outline-primary me-2 btn-sm'>Login</a></li>
        </ul>
    </header>

    <div class="container">
        <div class="content">
            <div class="button-section">
                <a href='signup.php' class='btn btn-primary btn-sm'>Sign Up</a>
                <a href='login.php' class='btn btn-success btn-sm'>Login</a>
            </div>

            <div class="right-section">
                <img src="tt.gif" alt="Right Image">
            </div>
        </div>

        <!-- Add your remaining content here -->
    </div>

    <div class="footer">
        <div class="social-media-icons">
            <a href='#' target='_blank'><img src='facebook_icon.png' alt='Facebook'></a>
            <a href='#' target='_blank'><img src='twitter_icon.png' alt='Twitter'></a>
            <a href='#' target='_blank'><img src='instagram_icon.png' alt='Instagram'></a>
            <!-- Add more social media icons as needed -->
        </div>
        <p>&copy; 2023 BrainWave. All rights reserved.</p>
    </div>
</body>

</html>
