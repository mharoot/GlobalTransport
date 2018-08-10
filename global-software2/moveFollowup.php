<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "global_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlUp1="update global_tracker_quote set status=1 where status=3";
$conn->query($sqlUp1);

$conn->close();

?>
