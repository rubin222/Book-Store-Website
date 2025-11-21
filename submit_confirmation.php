<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']); // Corrected variable name
$email = mysqli_real_escape_string($conn, $_POST['email']); // Added variable for email

// Insert data into the database
$sql = "INSERT INTO `users`(name, address, phone, email) VALUES ('$name', '$address', '$phone', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Confirmation submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
