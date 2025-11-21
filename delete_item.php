<?php
session_start(); // Start the session

// Check if the book_id is set in the POST request
if(isset($_POST['book_id'])) {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "shop_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to delete the item from the cart table
    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
    $sql_delete_cart = "DELETE FROM cart WHERE book_id = '$book_id'";

    // Execute the SQL query to delete from cart
    if (mysqli_query($conn, $sql_delete_cart)) {
        echo "Item removed successfully from cart!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Prepare SQL query to delete buyer details based on session
    $session_id = session_id();
    $sql_delete_user = "DELETE FROM users WHERE session_id = '$session_id'";

    // Execute the SQL query to delete buyer details
    if (mysqli_query($conn, $sql_delete_user)) {
        echo "Buyer details deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}

// Redirect back to the cart page
header("Location: cart.php");
exit;
?>
