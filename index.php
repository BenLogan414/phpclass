<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Benjamin's Webpage</title>
    <link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
    <header>
        <h1>PHP Class - Benjamin's Website</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Homepage</a></li>
            <li><a href="#">Loops</a></li>
            <li><a href="#">Countdown</a></li>
            <li><a href="#">Other</a></li>
        </ul>
    </nav>

    <main>
        <img src="images/ProfilePicture.jpg" alt="ProfilePicture">
        <p>My name is Benjamin Logan, and this is my third semester in the Software Developer program. I currently work
            at Contract Converting as a Machine Helper. My hobbies include bowling, golfing, football and basketball.</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> BenjaminLogan.com</p>
    </footer>
</body>
</html>