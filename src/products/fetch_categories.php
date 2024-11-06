<?php
// Connection to the database
$conn = new mysqli("localhost", "root", "", "shop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get unique categories
$query = "SELECT DISTINCT product_category FROM products";
$result = $conn->query($query);

// Generate options for the category dropdown
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['product_category']}'>{$row['product_category']}</option>";
}

// Close the connection
$conn->close();
?>
