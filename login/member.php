<?php

if(isset($_SESSION["roleID"]))
{
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Benjamin's Webpage</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
    <header>
        <?php include "../includes/header.php"; ?>
    </header>

    <nav>
        <?php include "../includes/nav.php"; ?>
    </nav>

    <main>
        <h3>Member Page</h3>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>