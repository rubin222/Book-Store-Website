<?php
session_start();

if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online book store website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="buyer_dashboard.css">
    <link rel="stylesheet" href="submit.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i>BookVerse</a>
            <h1>MY CART</h1>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <div class="col-lg-8">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Book Id.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        // Establish database connection
                        $conn = mysqli_connect("localhost", "root", "", "shop_db");
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        // Fetch cart items from the database
                        $sql = "SELECT * FROM cart";
                        $result = mysqli_query($conn, $sql);
                        // Check if the query was successful
                        if ($result === false) {
                            die("Error executing the SQL query: " . mysqli_error($conn));
                        }
                        // Check if there are any cart items
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td>$row[book_id]</td>
                                    <td>$row[product_name]</td>
                                    <td>$row[product_price]</td>
                                    <td> $row[quantity]</td>
                                    <td>
                                        <form action=\"delete_item.php\" method=\"POST\">  
                                            <input type=\"hidden\" name=\"book_id\" value=\"{$row['book_id']}\">
                                            <button type=\"submit\" class=\"btn btn-outline-danger\" onclick=\"return confirm('Are you sure you want to remove this item?')\">Remove</button>
                                            <button type=\"button\" class=\"btn btn-outline-safe open-modal\">Confirm</button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No items in cart</td></tr>";
                        }
                        // Close database connection
                        mysqli_close($conn);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="confirmationForm" action="submit_confirmation.php" method="POST">
                <div class="form-container">
                    <h1>Confirmation Form</h1>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <button type="submit1" id="submitBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- JavaScript for modal functionality -->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get all buttons that open the modal
        var btns = document.querySelectorAll(".open-modal");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on any button, open the modal
        btns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                modal.style.display = "block";
            });
        });
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <style>
        /* Centering the header text */
        .header {
            text-align: center;
        }
    </style>
</body>

</html>
