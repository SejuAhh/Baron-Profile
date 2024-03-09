<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Website | Shaira</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="" target="_blank">Shaira Nicole Baron</a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#skills">Hobbies</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#social">Social</a></li>
            <li><a href="#four">Contact Me</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
        <button id="menuButton" onclick="openMenu()">
            <i class='bx bx-menu'></i>
        </button>
    </nav>

    <div class="main" id="main">
        <div class="left">
            <article class="contact" data-page="contact">
                <header>
                    <h2 class="h2 article-title">Send Inquiries</h2>
                </header>
                <form action="comment.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" cols="50" required></textarea>
                    <input type="submit" value="Submit">
                </form>
            </article>
        </div>
    </div>
    <script>
    // Check if the feedback parameter is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const feedback = urlParams.get('feedback');

    // Display an alert if the feedback parameter is 'success'
    if (feedback === 'success') {
        alert('Thank you for your feedback!');
    }
</script>
</body>
</html>
