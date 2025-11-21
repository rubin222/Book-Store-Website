<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online book store website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"href="admin_style.css">

</head>
<body>
<?php include 'admin_header.php';?>

    
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i>BookVerse</a>
            <h1>AdminPanel</h1>
           
            <div class="icons">
               
                
                
                <a href="#" id="logout" class="fa-solid fa-right-from-bracket"></a>
            </div>

        </div>
        <div class="header-2">
            <nav class="navbar">
                <a href="admin_page.php">Home</a>
                <a href="admin_products.php">products</a>
                <a href="admin_orders.php">orders</a>
                <a href="admin_users.php">users</a>
                <a href="admin_reviews.php">reviews</a>

            </nav>
        </div>

        <section class="dashboard">
    <h1 class="title">dashboard</h1>
    <div class="box-container">
        <div class="box">
            <?php
            // Establish a connection to MySQL server
            $conn = mysqli_connect("localhost", "root", "", "shop_db");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch pending orders
            
            ?>
            
        

        

        <div class="box">
            <?php
            // Fetch total number of orders
            $select_orders = mysqli_query($conn, "SELECT * FROM `cart`") or die('Query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
            ?>
            <h3><?php echo $number_of_orders; ?></h3>
            <p>order placed</p>
        </div>
<div class="box">
    <?php
    $select_products= mysqli_query($conn, "SELECT *FROM `products`") or die('query failed');
    $number_of_products =mysqli_num_rows($select_products);
    ?>
    <h3><?php echo $number_of_products; ?></h3>
    <p>products added</p>

</div>
<div class="box">
<?php
// Establish a connection to MySQL server
$conn = mysqli_connect("localhost", "root", "");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, "login_register");

// Execute query to select users
$select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE role='buyer'") or die('Query failed');
$number_of_users = mysqli_num_rows($select_users);
?>
 <h3><?php echo $number_of_users; ?></h3>
    <p>normal users</p>
</div>
<div class="box">
<?php
// Establish a connection to MySQL server
$conn = mysqli_connect("localhost", "root", "");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, "login_register");

// Execute query to select users
$select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE role='admin'") or die('Query failed');
$number_of_admin = mysqli_num_rows($select_admin);
?>
 <h3><?php echo $number_of_admin; ?></h3>
    <p>admins</p>
</div>
<div class="box">
<?php
// Establish a connection to MySQL server
$conn = mysqli_connect("localhost", "root", "");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, "login_register");

// Execute query to select users
$select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('Query failed');
$number_of_account = mysqli_num_rows($select_account);
?>
 <h3><?php echo $number_of_account; ?></h3>
    <p>total accounts</p>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
