
<?php
// Getting the result of the polls
include 'dbConnect.php'; // Connects to your database

// Fetch poll results
$result = $conn->query("SELECT choice, COUNT(*) as count FROM votes GROUP BY choice");

echo "<h2>Poll Results</h2>";
while ($row = $result->fetch_assoc()) {
    echo $row['choice'] . ": " . $row['count'] . " votes<br>";
}

$conn->close();
?>
