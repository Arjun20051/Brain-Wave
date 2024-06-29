<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video Lecture Page</title>
        <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
        <!-- Bootstrap core CSS -->
        <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <title>FAQs - Online Learning Platform</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color:white;
            color:black;
        }
        .logo {
                height: 70px;
                width: 90px;
                margin-right: 10px;
                margin-bottom: 2px; /* Added margin-bottom for better spacing */
            }
    
            .fs-4 {
                margin-bottom: 0; /* Remove default margin-bottom to align with logo */
            }
    
            .nav-pills {
                align-items: center;
            }
    
            a {
                text-decoration: none;
            }
        header {
            background-color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ecf0f1;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: row;
        }

        .left-panel {
            flex: 2;
            padding: 20px;
        }

        .right-panel {
            flex: 1;
            text-align: center;
            padding: 20px;
        }

        .faq-item {
            margin-bottom: 20px;
        }

        .question {
            font-size: 18px;
            margin-bottom: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .answer {
            font-size: 16px;
            line-height: 1.6;
            display: none;
        }

        .toggle-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        
    </style>
</head>
<body>
<header class='d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom'>
                    <a href='#' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>
                        <img class='logo' src='logo.jpg'>
                        <span class='fs-4'>BrainWave</span>
                    </a>
                    <!-- ... (your existing header content) ... -->
                    <ul class='nav nav-pills'>
                        <li class='nav-item'><a href='course1.php' type='button' class='btn btn-outline-primary me-2'>My courses</a></li>
                  <!--      <li class='nav-item'><a href='lecture.php' type='button' class='btn btn-outline-primary me-2' class='nav-link active' aria-current='page'>Lectures</a></li>     -->
                          <!--       <li class='nav-item'><a href='pdf.php' type='button' class='btn btn-outline-primary me-2'>Study materials</a></li>      
                  <li class='nav-item'><a href='testhtml.php?courseid=<?php echo $courseId; ?>' type='button' class='btn btn-outline-primary me-2'>Take Test</a></li>
         <li class='nav-item'><a href='feedback.php' type='button' class='btn btn-outline-primary me-2'>Feedback</a></li>-->
                        <li class='nav-item'><a href='faq.php' type='button' class='btn btn-outline-primary me-2'>FAQs</a></li>
                        <li class='nav-item'><a href='aboutus.php' type='button' class='btn btn-outline-primary me-2'>About us</a></li>
                        <li class='nav-item'><a href='logout.php' type='button' class='btn btn-outline-primary me-2' >Logout</a></li>
                    </ul>
                    <!-- ... (your existing content) ... -->
                    
             
   
            </header>



    <div class="container">
        <div class="left-panel">
            <div class="faq-item">
                <div class="question" onclick="toggleAnswer(1)">
                    <div class="toggle-icon">+</div> How do I sign up for an account on the platform?
                </div>
                <div class="answer" id="answer1">Users can sign up by providing basic information such as name, email, and creating a password. Some platforms may also offer social media or Google sign-in options.</div>
            </div>

            <div class="faq-item">
    <div class="question" onclick="toggleAnswer(2)">
        <div class="toggle-icon">+</div> Can I access my courses on multiple devices?
    </div>
    <div class="answer" id="answer2">Yes, most online learning platforms allow users to access their courses on various devices, including computers, tablets, and smartphones.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(3)">
        <div class="toggle-icon">+</div> How do I enroll in a course?
    </div>
    <div class="answer" id="answer3">To enroll in a course, navigate to the course page and click on the "Enroll" or "Join" button. Follow the on-screen instructions to complete the enrollment process.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(4)">
        <div class="toggle-icon">+</div> Are there free courses available on the platform?
    </div>
    <div class="answer" id="answer4">Yes, many online learning platforms offer free courses alongside paid ones. You can explore the platform's catalog to find available free courses.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(5)">
        <div class="toggle-icon">+</div> How can I make a payment for a paid course?
    </div>
    <div class="answer" id="answer5">You can make a payment for a paid course using various payment methods, such as credit/debit cards, PayPal, or other secure payment gateways supported by the platform.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(6)">
        <div class="toggle-icon">+</div> Can I download course materials for offline use?
    </div>
    <div class="answer" id="answer6">Some platforms offer the option to download course materials for offline viewing. Check the platform's features or contact support for specific details.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(7)">
        <div class="toggle-icon">+</div> How are quizzes and assessments conducted?
    </div>
    <div class="answer" id="answer7">Quizzes and assessments are typically conducted online within the platform. They may include multiple-choice questions, short answers, or other assessment formats, depending on the course.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(8)">
        <div class="toggle-icon">+</div> What happens if I fail a final test?
    </div>
    <div class="answer" id="answer8">If you fail a final test, you may have the opportunity to retake it, depending on the course policy. Review the platform's guidelines or contact the course instructor for more information.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(9)">
        <div class="toggle-icon">+</div> How do I receive a course completion certificate?
    </div>
    <div class="answer" id="answer9">Upon successful completion of a course, you can usually download or receive a course completion certificate. Check the course details or contact support for information on certificate availability.</div>
</div>

<div class="faq-item">
    <div class="question" onclick="toggleAnswer(10)">
        <div class="toggle-icon">+</div> Is technical support available if I encounter issues?
    </div>
    <div class="answer" id="answer10">Yes, most online learning platforms provide technical support to help users with any issues they may encounter during their learning experience. You can usually find a support contact or help center on the platform.</div>
</div>


        </div>

        <div class="right-panel">
            <img src="faq.gif" alt="Platform Image" height="1000" width="1000">
        </div>
    </div>

    <script>
        function toggleAnswer(questionNumber) {
            const answer = document.getElementById('answer' + questionNumber);
            answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>
</html>
