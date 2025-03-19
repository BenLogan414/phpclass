<?php

$MemberKey = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

if(!empty($_POST["txtFirstName"]))
{
    if(!empty($_POST["txtLastName"]))
    {
        $txtFirstName = $_POST["txtFirstName"];
        $txtLastName = $_POST["txtLastName"];
        $txtAddress = $_POST["txtAddress"];
        $txtCity = $_POST["txtCity"];
        $txtState = $_POST["txtState"];
        $txtZip = $_POST["txtZip"];
        $txtPhone = $_POST["txtPhone"];
        $txtEmail = $_POST["txtEmail"];
        $txtPassword = $_POST["txtPassword"];
        $txtConfirm = $_POST["txtConfirm"];
        $error = "";

        if($txtPassword === $txtConfirm)
        {
            try
            {
                include "../includes/db.php";

                $hashedPassword = md5($txtPassword . $MemberKey);

                $sql = mysqli_prepare($con, "insert into customer 
                (FirstName, LastName, Address, City, State, Zip, Phone, Email, Password) values (?,?,?,?,?,?,?,?,?)");
                mysqli_stmt_bind_param($sql, "sssssssss", $txtFirstName, $txtLastName, $txtAddress,
                    $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $hashedPassword);
                mysqli_stmt_execute($sql);

                header("Location:index.php");
            }
            catch (mysqli_sql_exception $ex)
            {
                echo $ex;
            }
        }
        else
        {
            $error = "Passwords do not match.";
        }

    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Customer</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>
        label{
            display: inline-block;
            margin-top: 6px;
        }
        input{
            padding: 6px;
            margin-bottom: 10px;
            width: 100%;
            max-width: 250px;
        }
    </style>
</head>
<body>
    <header>
        <?php include "../includes/header.php"; ?>
    </header>

    <nav>
        <?php include "../includes/nav.php"; ?>
    </nav>

    <main>
        <form method="post">
            <label for="FirstName">First Name:</label>
            <input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $txtFirstName ?>" required>
            <br>

            <label for="LastName">Last Name:</label>
            <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $txtLastName ?>" required>
            <br>

            <label for="Address">Address:</label>
            <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $txtAddress?>" required>
            <br>

            <label for="City">City:</label>
            <input type="text" name="txtCity" id="txtCity" value="<?php echo $txtCity ?>" required>
            <br>

            <label for="State">State:</label>
            <input type="text" name="txtState" id="txtState" maxlength="2" value="<?php echo $txtState ?>" required>
            <br>

            <label for="Zip">ZIP:</label>
            <input type="text" name="txtZip" id="txtZip" value="<?php echo $txtZip?>" required>
            <br>

            <label for="Phone">Phone:</label>
            <input type="tel" name="txtPhone" id="txtPhone" value="<?php echo $txtPhone ?>" required>
            <br>

            <label for="Email">Email:</label>
            <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $txtEmail ?>" required>
            <br>

            <label for="Password">Password:</label>
            <input type="password" name="txtPassword" id="txtPassword" minlength="6" maxlength="16" required>
            <br>

            <label for="Confirm">Confirm Password:</label>
            <input type="password" name="txtConfirm" id="txtConfirm" minlength="6" maxlength="16" required>
            <br>

            <br><br>

            <button type="submit">Add Customer</button>

            <br><br>
        </form>

        <?php
            if($error)
            {
                echo "<p style='color: crimson'>$error</p>";
            }
        ?>

    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>