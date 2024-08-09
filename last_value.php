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

// Query to get the last direction
$sql_query = "SELECT direction FROM robotmovement ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $sql_query);

$last_value = "No data found";
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $last_value = $row['direction'];
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Last Direction Display</title>
  <link rel="stylesheet" href="styControl.css">
  <link rel="icon" type="image/png" href="/robot/Myicon.png">
</head>
<body>
  <div class="direction-info">
    <h1>Last Movement Direction</h1>
    <p>Last Direction: <?php echo htmlspecialchars($last_value); ?></p>
    <a href="robot.html" class="button back-to-control">Back</a>
  </div>
</body>
