<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete buyer details
$sql_delete_buyer = "DELETE FROM users";
if (mysqli_query($conn, $sql_delete_buyer)) {
    echo "Buyer details deleted successfully.<br>";
} else {
    echo "Error deleting buyer details: " . mysqli_error($conn) . "<br>";
}

// Delete book details
$sql_delete_books = "DELETE FROM cart";
if (mysqli_query($conn, $sql_delete_books)) {
    echo "Book details deleted successfully.<br>";
} else {
    echo "Error deleting book details: " . mysqli_error($conn) . "<br>";
}

// Close database connection
mysqli_close($conn);
?>
