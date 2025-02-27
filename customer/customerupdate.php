<?php
if (!empty($_POST["txtFirstName"])) {
    if (!empty($_POST["txtLastName"])) {
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
        $txtCustomerID = $_POST["txtCustomerID"];

        try {
            include "../includes/db.php";

            $sql = mysqli_prepare($con, "update customer set FirstName = ?, LastName = ?, Address = ?, City = ?,
                    State = ?, Zip = ?, Phone = ?, Email = ?, Password = ? where CustomerID = ?");
            mysqli_stmt_bind_param($sql, "ssssssssss", $txtFirstName, $txtLastName, $txtAddress,
                $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $txtPassword, $txtCustomerID);
            mysqli_stmt_execute($sql);

            header("Location:index.php");
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include "../includes/db.php";

    $sql = mysqli_prepare($con, "select * from customer where CustomerID = ?");
    mysqli_stmt_bind_param($sql, "s", $id);
    mysqli_stmt_execute($sql);

    $result = mysqli_stmt_get_result($sql);
    $row = mysqli_fetch_array($result);

    $txtFirstName = $row["FirstName"];
    $txtLastName = $row["LastName"];
    $txtAddress = $row["Address"];
    $txtCity = $row["City"];
    $txtState = $row["State"];
    $txtZip = $row["Zip"];
    $txtPhone = $row["Phone"];
    $txtEmail = $row["Email"];
    $txtPassword = $row["Password"];

}
else
{
    header("Location:index.php");
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Customer</title>
    <script type="text/javascript">
        function DeleteCustomer(firstname, lastname, id){
            if(confirm("Are you sure you want to delete " + firstname + " " + lastname + "?"))
            {
                document.location.href = 'customerdelete.php?id=' + id;
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>
        label {
            display: inline-block;
            margin-top: 6px;
        }

        input {
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
        <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $txtAddress ?>" required>
        <br>

        <label for="City">City:</label>
        <input type="text" name="txtCity" id="txtCity" value="<?php echo $txtCity ?>" required>
        <br>

        <label for="State">State:</label>
        <input type="text" name="txtState" id="txtState" maxlength="2" value="<?php echo $txtState ?>" required>
        <br>

        <label for="Zip">ZIP:</label>
        <input type="text" name="txtZip" id="txtZip" value="<?php echo $txtZip ?>" required>
        <br>

        <label for="Phone">Phone:</label>
        <input type="tel" name="txtPhone" id="txtPhone" value="<?php echo $txtPhone ?>" required>
        <br>

        <label for="Email">Email:</label>
        <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $txtEmail ?>" required>
        <br>

        <label for="Password">Password:</label>
        <input type="text" name="txtPassword" id="txtPassword" minlength="6" maxlength="16"
               value="<?php echo $txtPassword ?>" required>
        <br>

        <br><br>

        <input type="submit" value="Update Customer"/>
        <input type="submit" value="Delete Customer" onclick="DeleteCustomer('<?=$txtFirstName?>',
                '<?=$txtLastName?>', '<?=$id?>')">

        <br><br>
        <input type="hidden" name="txtCustomerID" value="<?=$id?>"/>
    </form>

</main>

<footer>
    <?php include "../includes/footer.php"; ?>
</footer>
</body>
</html>