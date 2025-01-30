<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops Assignment</title>
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
        <h1>This is the loops page</h1>
        <?php
        $Test = "This is my test string";

        $num1 = "100";
        $num2 = 55;

        echo $num1 + $num2;
        // to concatenate, do echo $num1.$num2;

        // echo $Test;
        /* <?=$Test;?> -- does the same thing */
        /* print ($Test); -- also does the same thing */

        $i = 1;
        while($i < 7){
            echo "<h$i>Hello World</h$i>";
            $i++;
        }

        $i = 6;
        while($i > 0){
            echo "<h$i>Hello World</h$i>";
            $i--;
        }

        for($i = 1; $i<7; $i++){
            echo "<h$i>Hello World</h$i>";
        }

        echo "<br /><br /><hr /><br />";
        $FullName = "Doug Smith";
        //           0123456789

        $Position = strpos($FullName, " ");
        echo $Position;

        echo "<br /><br /><hr /><br />";
        $stuff = "My Stuff";
        echo "<h3>$stuff</h3>"; // MyStuff is displayed (it is the value of $stuff)
        echo '<h3>$stuff</h3>'; // To display a $ use single quotes '' (In this case, $stuff is displayed)


        echo "<br /><br /><hr /><br />";

        echo strtoupper($FullName)."<br />";
        echo strtolower($FullName)."<br />";

        echo "<br /><br /><hr /><br />";

        $nameParts = explode(" ", $FullName); // explode separates strings into array elements

        echo $nameParts[0]."<br /><br />";
        echo $nameParts[1]."<br /><br />";

        ?>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>