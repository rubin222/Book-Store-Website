<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the search query is set
if(isset($_GET['query'])){
    // Sanitize the search query
    $search_query = mysqli_real_escape_string($conn, $_GET['query']);

    // Perform the search query
    $sql = "SELECT * FROM `products` WHERE name LIKE '%$search_query%' OR price LIKE '%$search_query%'";
    $result = mysqli_query($conn, $sql);

    // Check if any results were found
    if(mysqli_num_rows($result) > 0) {
        // Display the search results
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='search-result'>";
            echo "<img src='Uploaded_img/{$row['image']}' alt=''>";
            echo "<div class='name'>{$row['name']}</div>";
            echo "<div class='price'>{$row['price']}</div>";
            //echo '<input type="submit" value="Add to Cart" class="btn">';
            // Add "add to cart" button with green background
            echo "<button class='add-to-cart-btn' style='background-color:#27ae60;'>Add to Cart</button>";
            echo "</div>";
        }
    } else {
        // No results found message
        echo "No results found.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
