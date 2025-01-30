<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countdown Clock</title>
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
        <h1>Countdown to the End of Semester</h1>
        <?php

        $now = time();
        //echo $now;

        //echo "<br /><br /><hr /><br />";

        $secPerMin = 60;
        $secPerHour = 60 * $secPerMin; // 3600 would work too
        $secPerDay = 24 * $secPerHour;
        $secPerYear = 365 * $secPerDay;

        // Calculate total seconds from now to set date
        // Set-date is 5/16/2025 at 11:59 PM
        $constructionDone = mktime(23, 59, 59, 5, 16, 2025);
        $seconds = $constructionDone - $now;

        // Calculate years left from now to set date
        $years = floor($seconds / $secPerYear);
        $seconds = $seconds % $secPerYear;

        // Calculate days left from now to set date
        $days = floor($seconds/$secPerDay);
        $seconds = $seconds % $secPerDay;

        // Calculate hours left from now to set date
        $hours = floor($seconds/$secPerHour);
        $seconds = $seconds % $secPerHour;

        // Calculate minutes and seconds left from now to set date
        $minutes = floor($seconds/$secPerMin);
        $seconds = $seconds % $secPerMin;

        ?>

        <h3>Years <?=$years?> | Days <?=$days?> | Hours <?=$hours?> | Minutes <?=$minutes?> | Seconds <?=$seconds?></h3>

    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>