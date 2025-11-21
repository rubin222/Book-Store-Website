<?php
// Handle form submission and redirect to seller dashboard

// Retrieve form data
$book_id = $_POST['book_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Validate form data (you can add your validation logic here)

// Redirect to the seller dashboard with the form data as parameters
header("Location: admin_orders.php?book_id=$book_id&product_name=$product_name&product_price=$product_price&name=$name&address=$address&phone=$phone&email=$email");
exit;
?>
