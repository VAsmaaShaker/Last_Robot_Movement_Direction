<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "robot";

// Establishing connection to database
$con = mysqli_connect($serverName, $userName, $password, $dbName);

// Checking connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handling form submission
if (isset($_POST['button'])) {
    $button_value = $_POST['button'];
    // Inserting data into database
    $sql_query = "INSERT INTO robotmovement (direction) VALUES ('$button_value')";
    
    if (!mysqli_query($con, $sql_query)) {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($con);
    }
}

// Closing database connection
mysqli_close($con);

// Redirect to HTML page
header("Location: robot.html");
exit();
?>
