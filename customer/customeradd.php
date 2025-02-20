<?php
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

        try
        {
            include "../includes/db.php";

            $sql = mysqli_prepare($con, "insert into customer 
            (FirstName, LastName, Address, City, State, Zip, Phone, Email, Password) values (?,?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($sql, "sssssssss", $txtFirstName, $txtLastName, $txtAddress,
            $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $txtPassword);
            mysqli_stmt_execute($sql);

            header("Location:index.php");
        }
        catch (mysqli_sql_exception $ex)
        {
            echo $ex;
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
            display: block;
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
            <input type="text" name="txtFirstName" id="txtFirstName" required>

            <label for="LastName">Last Name:</label>
            <input type="text" name="txtLastName" id="txtLastName" required>

            <label for="Address">Address:</label>
            <input type="text" name="txtAddress" id="txtAddress" required>

            <label for="City">City:</label>
            <input type="text" name="txtCity" id="txtCity" required>

            <label for="State">State:</label>
            <input type="text" name="txtState" id="txtState" maxlength="2" required>

            <label for="Zip">ZIP:</label>
            <input type="text" name="txtZip" id="txtZip" required>

            <label for="Phone">Phone:</label>
            <input type="tel" name="txtPhone" id="txtPhone" required>

            <label for="Email">Email:</label>
            <input type="text" name="txtEmail" id="txtEmail" required>

            <label for="Password">Password:</label>
            <input type="password" name="txtPassword" id="txtPassword" minlength="6" maxlength="16" required>

            <br><br>

            <button type="submit">Add Customer</button>

            <br><br>
        </form>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>