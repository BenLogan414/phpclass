<?php
session_start(); // HAS to be on line 2 (no spaces, no empty lines)



// exit(); - stops the execution of following code

if(isset($_POST["txtQuestion"]))
{
    $question = $_POST["txtQuestion"];
}
else
{
    $question = "";
}

if(isset($_SESSION["PrevQuestion"]))
{
    $PrevQuestion = $_SESSION["PrevQuestion"];
}
else
{
    $PrevQuestion = "";
}

if($question=="")
{
    $answer = "Ask me a question!";
}
elseif(substr($question, -1)!="?")
{
    $answer = "Ask me a question with a question mark at the end.";
    }
    elseif($question==$PrevQuestion)
    {
        $answer = "Ask me a new question!";
    }
else {
    $responses = array();
    $responses[0] = "Better luck later";
    $responses[1] = "Most definitely";
    $responses[2] = "Not in a million years";
    $responses[3] = "Nuh uh";
    $responses[4] = "Sure, go for it";
    $responses[5] = "Maybe tomorrow";
    $responses[6] = "My computer lost the connection";
    $responses[7] = "I forgot";
    $responses[8] = "You're wasting my time with this";
    $responses[9] = "In another life";
    $responses[10] = "I will explode in your face";
    $responses[11] = "Absolutely";
    $responses[12] = "This ball will self destruct in 4 seconds";
    $responses[13] = "I'll pay you not to ask that again";
    $responses[14] = "Cannot predict now";

    $iResponse = mt_rand(0,14);

    $answer = $responses[$iResponse];
    $_SESSION["PrevQuestion"] = $question;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magic 8 Ball</title>
    <style>
        div {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .bounce {
            height: 50px;
            overflow: hidden;
            position: relative;
            background: #fefefe;
            color: #333;
            border: 4px solid #4a4a4a;
        }

        .bounce p {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 50px;
            text-align: center;
            -moz-transform: translateX(50%);
            -webkit-transform: translateX(50%);
            transform: translateX(50%);
            -moz-animation: bouncing-text 5s linear infinite alternate;
            -webkit-animation: bouncing-text 5s linear infinite alternate;
            animation: bouncing-text 10s linear infinite alternate;
        }

        @-moz-keyframes bouncing-text {
            0% {
                -moz-transform: translateX(50%);
            }
            100% {
                -moz-transform: translateX(-50%);
            }
        }

        @-webkit-keyframes bouncing-text {
            0% {
                -webkit-transform: translateX(50%);
            }
            100% {
                -webkit-transform: translateX(-50%);
            }
        }

        @keyframes bouncing-text {
            0% {
                -moz-transform: translateX(50%);
                -webkit-transform: translateX(50%);
                transform: translateX(50%);
            }
            100% {
                -moz-transform: translateX(-50%);
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }
        }
    </style>
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
        <h1>The Magic 8 Ball</h1>

        <div class="bounce">
            <p><?=$answer?></p>
        </div>

        <br>

        <form method="post">
            <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>">
            <input type="submit" value="Ask the 8 Ball">
        </form>

    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>