<?php

    $die1 = mt_rand(1, 6);
    $die2 = mt_rand(1, 6);
    $die3 = mt_rand(1, 6);
    $die4 = mt_rand(1, 6);
    $die5 = mt_rand(1, 6);

    $playerScore = $die1 + $die2;
    $computerScore = $die3 + $die4 + $die5;

    if($computerScore > $playerScore)
    {
        $result = "Computer Wins!";
    }
    elseif($playerScore > $computerScore)
    {
        $result = "You Win!";
    }
    elseif($computerScore = $playerScore)
    {
        $result = "Tie!";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dice Game</title>
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
        <h3>Your score: <?php echo $playerScore; ?></h3>
        <div class="dice">
            <img src="../images/dice_<?php echo $die1; ?>.png" alt="Die 1">
            <img src="../images/dice_<?php echo $die2; ?>.png" alt="Die 2">
        </div>
        <h3>Computers score: <?php echo $computerScore; ?></h3>
        <div class="dice">
            <img src="../images/dice_<?php echo $die3; ?>.png" alt="Die 3">
            <img src="../images/dice_<?php echo $die4; ?>.png" alt="Die 4">
            <img src="../images/dice_<?php echo $die5; ?>.png" alt="Die 5">
        </div>
        <h1>Result: <?php echo $result; ?></h1>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>