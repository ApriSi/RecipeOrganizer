<?php

require_once "DatabaseConnection.php";
require_once "EnvLoader.php";

// Create an instance of the database connection
$database = new DatabaseConnection('localhost', getenv("USER"), getenv("PASSWORD"), 'dnndxydh_RecipeApp');
$database->connect();
$connection = $database->getConnection();

// Perform a sample query
$sql = "SELECT * FROM Ingredients";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$database->close();
?>