<?php
$conn = mysqli_connect("localhost", "root", "", "shop_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required keys are set in the $_POST data
    if (isset($_POST['book_id'], $_POST['name'], $_POST['price'], $_POST['quantity'])) {
        $productId = $_POST['book_id'];
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $quantity = $_POST['quantity']; // Add quantity parameter

        $productId = mysqli_real_escape_string($conn, $productId);
        $productName = mysqli_real_escape_string($conn, $productName);
        $productPrice = mysqli_real_escape_string($conn, $productPrice);
        $quantity = mysqli_real_escape_string($conn, $quantity);

        // Check if the item already exists in the cart
        $checkIfExistsSql = "SELECT * FROM cart WHERE book_id = '$productId'";
        $result = mysqli_query($conn, $checkIfExistsSql);
        if (mysqli_num_rows($result) > 0) {
            echo "Item is already added";
            exit();
        }

        $userId = 1; // Replace with actual user ID (if available)
        $sql = "INSERT INTO cart (book_id, product_name, product_price, quantity) VALUES ('$productId', '$productName', '$productPrice', '$quantity')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Product added successfully...";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "One or more required fields are missing.";
    }
}

// Initialize $response array with default values to avoid undefined key warnings
$response = array(
    'productName' => '',
    'productPrice' => '',
    'quantity' => ''
);

echo json_encode($response);

mysqli_close($conn);
?>
