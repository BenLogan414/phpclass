<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <style>
        table, th, td{
            border: 1px solid;
            table-layout: fixed;
            width: 100%;
            overflow: hidden;
        }
        table{
            margin-bottom: 50px;
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
        <h3>Customers</h3>
        <table>
            <tr>
                <th>CustomerID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
            </tr>

            <?php

            try
            {
                include "../includes/db.php";

                $rs = mysqli_query($con, "select * from customer");

                while($row = mysqli_fetch_array($rs))
                {
                    $customerID = $row['CustomerID'];
                    $firstName = $row['FirstName'];
                    $lastName = $row['LastName'];
                    $address = $row['Address'];
                    $city = $row['City'];
                    $state = $row['State'];
                    $zip = $row['Zip'];
                    $phone = $row['Phone'];
                    $email = $row['Email'];
                    $password = $row['Password'];

                    echo "<tr>";
                    echo "<td>$customerID</td>";
                    echo "<td>$firstName</td>";
                    echo "<td>$lastName</td>";
                    echo "<td>$address</td>";
                    echo "<td>$city</td>";
                    echo "<td>$state</td>";
                    echo "<td>$zip</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$email</td>";
                    echo "<td>$password</td>";
                    echo "</tr>";
                }
            }
            catch (mysqli_sql_exception $ex)
            {
                echo $ex;
            }


            ?>
        </table>
        <a href="customeradd.php">Add New Customer</a>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
</body>
</html>