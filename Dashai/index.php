<?php
require_once "config.php"; // Make sure this is the correct path to your config.php file

session_start(); // Start session to access session variables

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the logout button is pressed
    if (isset($_POST['logout'])) {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page or any other desired page
        header("Location: register.php");
        exit();
    }

    if (isset($_POST['message'])) {
        $message = $_POST['message'];

        try {
            // Retrieve the user ID from the session
            $user_id = $_SESSION['id'];

            // First, let's find the email based on the user ID
            $user_stmt = $link->prepare("SELECT email FROM users WHERE id = ?");
            $user_stmt->bind_param("i", $user_id);
            $user_stmt->execute();
            $user_result = $user_stmt->get_result();

            if ($user_result->num_rows > 0) {
                // If user exists, fetch the email
                $user = $user_result->fetch_assoc();
                $email = $user['email'];

                // Prepare the INSERT statement to insert into leaderboard
                $stmt = $link->prepare("INSERT INTO messages (user_id, email, message) VALUES (?, ?, ?)");
                $stmt->bind_param("iss", $user_id, $email, $message);
                $stmt->execute();
                
                // Redirect the user to mpage.html
                header("Location: login.php");
                exit();
            } else {
                // Handle case where the email for the provided user ID does not exist
                echo "Error: email for the provided user ID does not exist.";
            }
        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <link rel="stylesheet" href="style.css">
    <title>Personal Website | Shaira</title>
</head>

<body>
    <div id="loading-screen">
        
        <p id="welcome">WELCOME</p>
    </div>
    <nav>
            <div class="logo">
            <a href="" target="_blank">Shaira Nicole Baron</a>
        </div>
        <ul>
            <li><a href="#main">Home</a></li>
            <li><a href="#skills">Hobbies</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#portfolio">Social</a></li>
            <li><a href="#four">Contact Me</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
        <button id="menuButton" onclick="openMenu()">
            <i class='bx bx-menu'></i>
        </button>
    </nav>

    <div class="main" id="main">
        <div class="left">
            <h5>Hey, I am Shaira</h5>
            <h3>I study at <span>National University Fairview</span> , and this is my personal website.</h3>
            <p>
                I am a gamer, reader, and otaku and UI/UX enthusiast.
            </p>
            <div class="cv-button">
                <button class="btn" onclick="window.open('BaronCV Resume.pdf')">DOWNLOAD CV</button>
            </div>
        </div>
        <div class="right">
            <img src="prof1.jpg">
        </div>
    </div>
    <div class="skills" id="skills">
    <h3>My Hobbies</h3>
    <div class="container">
        <div class="card__container">
            <article class="card__article">
                <img src="beach.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <span class="card__description">Aklan, Boracay</span>
                    <h2 class="card__title">Vacation</h2>
                    <a href="#" class="card__button">Read More</a>
               </div>
            </article>
            <article class="card__article">
               <img src="flight.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Above the night sky, Manila lights</span>
                  <h2 class="card__title">Starry Night</h2>
                   <a href="#" class="card__button">Read More</a> 
               </div>
            </article>

            <article class="card__article">
               <img src="lala.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">My Cat</span>
                  <h2 class="card__title">My bestbuddy</h2>
                  <a href="#" class="card__button">Read More</a>
               </div>
            </article>
            <article class="card__article">
               <img src="cloud.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">After the rain</span>
                  <h2 class="card__title">Like to at the Clouds</h2>
                   <a href="#" class="card__button">Read More</a> 
               </div>
            </article>
            <article class="card__article">
               <img src="church.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <span class="card__description">Baclaran Church</span>
                  <h2 class="card__title">Mesmorize the architecture</h2>
                   <a href="#" class="card__button">Read More</a> 
               </div>
            </article>
            <article class="card__article">
                <img src="food.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <span class="card__description">Love for Food</span>
                    <h2 class="card__title">We know we love to spend on food</h2>
                    <a href="#" class="card__button">Read More</a>
                </div>
            </article>
        </div>
    </div>
</div>

    <div class="about" id="about">
        <div class="left">
            <img src="Aboutme.jpg">
        </div>
        <div class="right">
            <h3>About Me</h3>
            <p>
            "My name is Shaira. I enjoy spending my free time sleeping. 
            I was born in Pasay but currently reside in North Camarin. 
            A palm reader in Quiapo once told me that I could become wealthy 
            if I carefully choose my future career.I always find time to read,
            whether it's manhwa, manga, or novels. Additionally, I have a passion
            for photography.I'm not a picky eater and often spend a significant 
            portion of my allowance on good food—almost all of it, to be honest. Lol."
            </p>
            <p>
                Today Im practicing UI&UX I enjoy it alot also HTML CSS and Javascript so far no one knows what I will be in the future.
            </p>
        </div>
    </div>

    <div class="portfolio" id="portfolio">
        <div class="header">
            <div class="info">
                <h3>Socials</h3>
            </div>
        </div>
        <div class="portfo-items">
            <div class="item">
                <img src="linkedin.jpg">
                <div class="info">
                    <h4>My LinkedIn</h4>
                    <a href="https://www.linkedin.com/feed/" target="_blank">View my Linkedin<i class='bx bxl-linkedin-square' ></i></a>
                </div>
            </div>
            <div class="item">
                <img src="github.jpg">
                <div class="info">
                    <h4>My Github</h4>
                    <a href="https://github.com/SejuAhh" target="_blank">Github<i class='bx bxl-github'></i></a>
                </div>
            </div>
            <div class="item">
                <img src="instagram.jpg">
                <div class="info">
                    <h4>My Instagram</h4>
                    <a href="https://www.instagram.com/seju.pzy/" target="_blank">Instagram<i class='bx bxl-instagram' ></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="four">
    <div id="ficon">
        <div id="lfticon"></div>
        <article class="contact" data-page="contact">
        <header>
          <h2 class="h2 article-title">Send a message</h2>
        </header>
        </section>
        <section class="contact-form">
          <form action="submit.php" method="post" class="form" data-form>
            <div class="input-wrapper">
              <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input>

              <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input>
            </div>
            <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>
            <button class="form-btn" type="submit" disabled data-form-btn>
              <ion-icon name="paper-plane"></ion-icon>
              <span>Get in touch</span>
            </button>
          </form>
        </section>
      </article>
    </div>
    <div id="four">
            <div id="ficon">
                <div id="lfticon"></div>
                <h1>Let's work <br><span>together</span></h1>
            </div>
    <div id="fline" class="line">
        <div class="hrline"></div>
    </div>
    <div id="getintouch">
    <a href="login.php"><h1>Click! to Leave your inquiries</h1></a>
    </div>
    <div id="buttons">
        <div id="fleftbtn">
            <a href="comment.php">sncbaron@gmail.com</a>
        </div>
        <div id="frightbtn">
            <a href="comment.php">+63 968415580</a>
        </div>
    </div>
    <div id="amarjeet">
        <h1>Created by Shaira Nicole C Baron | Thank you <span></span></h1>
    </div>
</div>
</div>

    <script src="script.js"></script>
</body>

</html>