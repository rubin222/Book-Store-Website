<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online book store website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i>BookVerse</a>
            <h1>Orders Placed</h1>
            <div class="icons">
                <a href="#" id="logout" class="fa-solid fa-right-from-bracket"></a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php
                // Establish database connection
                $conn = mysqli_connect("localhost", "root", "", "shop_db");

                 // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch buyer details from the database
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                // Check if there are any buyer details
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    echo "<h2>Buyer Details</h2>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<table class="table">';
                        echo "<tr>";
                        echo "<td>Name:</td><td>" . $row['name'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Address:</td><td>" . $row['address'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Phone:</td><td>" . $row['phone'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Email:</td><td>" . $row['email'] . "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "<br></br>";
                        
                    }
                } else {
                    echo "<p class='text-muted'>No buyer details found.</p>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </div>
            <div class="col-lg-6">
                <?php
                // Establish database connection
                $conn_books = mysqli_connect("localhost", "root", "", "shop_db");

                // Check connection
                if (!$conn_books) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch book details from the database
                $sql_books = "SELECT * FROM cart";
                $result_books = mysqli_query($conn_books, $sql_books);

                // Check if there are any book details
                if (mysqli_num_rows($result_books) > 0) {
                    // Output data of each row
                    echo "<h2>Book Details</h2>";
                    
                    while ($row_books = mysqli_fetch_assoc($result_books)) {
                        echo '<table class="table">';
                        echo "<tr>";
                        echo "<td>Book Name:</td><td>" . $row_books['product_name'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Book Price:</td><td>" . $row_books['product_price'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Quantity:</td><td>" . $row_books['quantity'] . "</td>";
                        echo "</tr>";
                        echo "<br></br>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No book details found.</p>";
                }

                // Close database connection
                mysqli_close($conn_books);
                ?>
            </div>
        </div>
        ...
</div>
<button id="completeOrderBtn" class="btn btn-primary">Order Completed</button>
<script>
    document.getElementById("completeOrderBtn").addEventListener("click", function() {
        // Send an AJAX request to a PHP script that deletes the details from the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_order.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page after successful deletion
                window.location.reload();
            }
        };
        xhr.send();
    });
</script>

</body>
</html>

