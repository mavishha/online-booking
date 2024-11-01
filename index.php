<?php
$insertconf = false;
if (isset($_POST['name'])) {
    // Database connection
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'survey');

    if (!$con) {
        die("Connection with the database failed: " . mysqli_connect_error());
    }

    // Capture form data
    $name = $_POST['name'];
    $mobile = $_POST['mobile']; // Corrected variable name
    $email = $_POST['email'];
    $date = $_POST['date'];

    // Insert data into the database
    $sql_query = "INSERT INTO `survey` (`name`, `mobile`, `email`, `date`) VALUES ('$name', '$mobile', '$email', '$date')";

    if ($con->query($sql_query) === true) {
        $insertconf = true;
    } else {
        echo "Error: $sql_query <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="stylesheet" href="forms.css">
</head>
<body>
<div class="container">
    <h1>BOOK NOW</h1>
    <p>Enter your details so that we can contact you</p>
    <div id="confirm">
        <?php
        if ($insertconf) {
            echo "<h1>Booking Successfully</h1>";
        }
        ?>
    </div>

    <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name" required><br>
        <input type="text" name="mobile" id="mobile" placeholder="Enter your phone number" required><br>
        <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
        <input type="date" name="date" id="date" required><br>

        <button type="submit" id="submitBtn">Submit</button>
        <button type="reset">Reset</button>
    </form>
</div>
</body>
</html>
