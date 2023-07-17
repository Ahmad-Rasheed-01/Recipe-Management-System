<?php
$servername = "localhost";
$username = "userr";
$password = "root";
$dbname = "userr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$fullName = $_POST["fullName"];
$emailAddress = $_POST["emailAddress"];
$mealName = $_POST["mealName"];
$categoryName = $_POST["categoryName"];
$instructions = $_POST["instructions"];
$picture = $_POST["picture"];
$videoLink = $_POST["videoLink"];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO userRecipe (fullName, emailAddress, mealName, categoryName, instructions, picture, videoLink) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $fullName, $emailAddress, $mealName, $categoryName, $instructions, $picture, $videoLink);

// Execute the SQL statement
if ($stmt->execute()) {
    $recipeID = $conn->insert_id; // Get the auto-generated ID of the inserted recipe
    // Redirect to submission-report.php with query parameters
    header("Location: submission-report.php?fullName=$fullName&emailAddress=$emailAddress&mealName=$mealName&categoryName=$categoryName&instructions=$instructions&picture=$picture&videoLink=$videoLink");
    exit();

} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
