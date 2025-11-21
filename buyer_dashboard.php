
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
    <link rel="stylesheet"href="buyer_dashboard.css">

</head>
<body>




    
<header class="header">
    <div class="header-1">
        <a href="#" class="logo"> <i class="fas fa-book"></i>BookVerse</a>
        <form method="GET" action="search.php" class="search-form">
            <input type="search" name="query" placeholder="Search here..." id="search-box">
            <button type="submit" class="fas fa-search" id="search-btn"></button>
        </form>

        <div class="icons">
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <a href="#" id="logout" class="fa-solid fa-right-from-bracket"></a>
        </div>
    </div>


<div class="header-2">
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#Featured">Featured</a>
        <a href="#Arrivals">Arrivals</a>
        <a href="#Reviews">Reviews</a>
        <a href="#blogs">Blogs</a>
    </nav>
</div>
</header>


            
        </div>
    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#Featured" class="fas fa-list"></a>
        <a href="#Arrivals" class="fas fa-tags"></a>
        <a href="#Reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>

    </nav>
    <div class="login-form-container">
        <div id="close-login-btn" class="fas fa-times"></div>
        
        

            

    </div>
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Get a great Deal</h3>
                <p>"Welcome to our enchanting world of books, where every page holds a new adventure and every story sparks imagination. Explore our vast collection of literary treasures, from timeless classics to thrilling new releases."</p>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="siris ko phool.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="munmadan.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="ijoriya.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="khusi.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="china harayeko manche.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="palpasa cafe.jpg"alt=""></a>
                </div>
                

            </div>
        </div>
    </section>
    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-paper-plane"></i>
            <div class="Content">
            <h3>Free Shipping</h3>
            <p>Order over RS.1000</p>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="Content">
            <h3>Secure Payment</h3>
            <p>100 Secure payment</p>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="Content">
            <h3>Easy Returns</h3>
            <p>10 days returns</p>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="Content">
            <h3>24/7 Support </h3>
            <p>Call us anytime</p>
            </div>
        </div>
    </section>
    

    <section class="Featured" id="Featured">
    <h1 class="heading"><span>Featured Books</span></h1>
    <section class="featured-books">
        <div class="book-container">
            <?php
            // Establish a database connection
            $conn = mysqli_connect("localhost", "root", "", "shop_db");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch the latest added books by the admin
            $select_featured_books = mysqli_query($conn,"SELECT * FROM `products` ORDER BY id DESC LIMIT 4") or die('query failed');
            if(mysqli_num_rows($select_featured_books) > 0){
                while($fetch_featured_book = mysqli_fetch_assoc($select_featured_books)){ 
            ?>
            <!-- Inside the loop where you display products -->
            <div class="book">
    <img src="Uploaded_img/<?php echo $fetch_featured_book['image']; ?>" alt="">
    <div class="details">
        <h3 class="book-name"><?php echo $fetch_featured_book['name']; ?></h3>
        <p class="book-price"><?php echo 'Price: ' . $fetch_featured_book['price']; ?></p>
        <!-- Add to Cart Form -->
        <!-- Add to Cart Form -->
<form method="post" action="addToCart.php">
    <div class="quantity-container">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" required size="5"><br><br>
    </div>
    <input type="hidden" name="book_id" value="<?php echo $fetch_featured_book['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $fetch_featured_book['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $fetch_featured_book['price']; ?>">
    <br>
    <input type="submit" value="Add to Cart" class="btn">
    <!-- Confirm Button -->
    
</form>

<script>
    // Function to show user information form
    document.querySelector('.confirm-btn').addEventListener('click', function() {
        document.querySelector('.user-info').classList.remove('hidden');
    });
</script>

    </div>
</div>




    </div>
</div>

            <!--<div class="book">
    

            

            <div class="book">
                <img src="Uploaded_img/php echo $fetch_featured_book['image']; ?>" alt="">
                <div class="details">
        
    <h3 class="book-name">php echo $fetch_featured_book['name']; ?></h3>
    <p class="book-price">php echo 'Price: ' . $fetch_featured_book['price']; ?></p>
    <input type="submit" value="Add to Cart" class="btn">
        

</div>-->

                

 <!--Move your JavaScript code to the bottom of your HTML document -->



</div>

            </div>
            <?php
                }
            } else {
                echo '<p class="empty">No featured books available.</p>';
            }
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault(); // Prevent default form submission
        $.ajax({
            type: "POST",
            url: "addToCart.php",
            data: $(this).serialize(), // Serialize form data
            success: function(response){
                // Handle the response here
                alert(response); // Display response message
            }
        });
    });
});

</script>

    </section>
</section>-


            
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    
    

    </section>

    
    <section class="newsletter">
        <h3>On your marks, get set, READ!</h3>
        </section>

    <section class="Arrivals" id="Arrivals">
        <h1 class="heading"><span>New Arrivals</span></h1>
        <div class="swiper arrivals-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrival.1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrival.2.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrival.3.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrival.4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrival.5.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="swiper arrivals-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrivals.6.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrivals.7.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.599<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrivals.8.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrivals.9.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="arrivals.10.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>New Arrivals</h3>
                        <div class="price">RS.1099<span>RS.1599</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        


    </section>
    <section class="deal">
        <div class="content">
            <h3>Deal of the day</h3>
            <h1>Upto 30% off</h1>
            <p>Hurry up!!Get upto 30% off and free delivery charge upto 24 hours.</p>
            <a href="#" class="btn">Shop Now</a>

        </div>
        <div class="image">
            <img src="deal.avif" alt="">
        </div>

    </section>

    <section class="Reviews" id="Reviews">
        <h1 class="heading"><span>Customer's Reviews</span></h1>
        <div class="swiper Reviews-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="akhilesh.jpg" alt="">
                    <h3>Akhilesh Sharma</h3>
                    <p>"I absolutely love shopping on this book store website! The interface is user-friendly, making it easy to find exactly what I'm looking for. The selection is fantastic, with a wide variety of genres and authors to choose from. Plus, the shipping is always quick and reliable. Highly recommend!"</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    


Z
                            
        </div>
    </div>
    <div class="swiper-slide box">
        <img src="adhit.jpg" alt="">
        <h3>Adhit Upadhayay</h3>
        <p>"I've been a loyal customer of this book store website for years, and for good reason. The quality of their books is always top-notch, and I appreciate the detailed descriptions and reviews that help me make informed decisions."</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        



                
</div>
</div>
<div class="swiper-slide box">
    <img src="Rubin.jpg" alt="">
    <h3>Rubin Karki</h3>
    <p>"I stumbled upon this book store website while searching for a rare title, and I'm so glad I did! Not only did they have the book I was looking for, but their prices were reasonable and the checkout process was seamless."</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    



            
</div>
</div>
<div class="swiper-slide box">
    <img src="nirjala.jpg" alt="">
    <h3>Nirjala Bhattarai</h3>
    <p>"As an avid reader, I've tried many online book stores, but this one stands out above the rest. The website is well-designed and easy to navigate, and I appreciate the personalized recommendations based on my past purchases.</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    



            
</div>
</div>
<div class="swiper-slide box">
    <img src="pranita.jpg" alt="">
    <h3>Pranita Karki</h3>
    <p>"I recently ordered a few books from this store, and I couldn't be happier with my purchase. The selection is extensive, covering everything from bestsellers to niche topics, and the prices are competitive. What really impressed me, though, was the attention to detail in packaging - each book was carefully wrapped and arrived in pristine condition."</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    



            
</div>
</div>
</div>
<section class="blogs" id="blogs">
        <h1 class="heading"><span>Our Blogs</span></h1>
        <div class="swiper blogs-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slider box">
                    <div class="image">
                        <img src="blog.1.jpg" alt="">

                    </div>
                    <div class="content">
                        <h3>"The Benefits of Reading: Why Books Matter"</h3>
                        <p>In a world driven by digital distractions, the value of reading books cannot be overstated.</p>
                        
                    </div>
                </div>
                
                <div class="swiper-slider box">
                    <div class="image">
                        <img src="blog.2.avif" alt="">

                    </div>
                    <div class="content">
                        <h3>"Reading for Wellness: How Books Can Improve Mental Health"</h3>
                        <p>"Reading for Wellness: How Books Can Improve Mental Health" delves into the transformative power of literature in promoting emotional well-being.</p>
                        
                    </div>
                </div>
                apper">
                <div class="swiper-slider box">
                    <div class="image">
                        <img src="blog.3.jpg" alt="">

                    </div>
                    <div class="content">
                        <h3>"Bookstore History: Tracing the Evolution of Literary Spaces"</h3>
                        <p>Tracing the Evolution of Literary Spaces" offers a concise exploration of the development.</p>
                        
                    </div>
                </div>
                
                <div class="swiper-slider box">
                    <div class="image">
                        <img src="blog.4.jpg" alt="">

                    </div>
                    <div class="content">
                        <h3>"Bookish Gift Ideas: Perfect Presents for Bibliophiles"</h3>
                        <p> Perfect Presents for Bibliophiles" presents a curated selection of unique and thoughtful gifts tailored for book lovers.</p>
                        
                    </div>
                </div>
                
                <div class="swiper-slider box">
                    <div class="image">
                        <img src="blog.5.webp" alt="">

                    </div>
                    <div class="content">
                        <h3>"Bookstore Events: Meet the Authors and Join the Fun"</h3>
                        <p>Opportunity to engage directly with their favorite writers while immersing themselves in a vibrant community atmosphere.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>pur locations</h3>
                <a href="#"><i class="fas fa-map-marker-alt"></i>Nepal</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>India</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>Bhutan</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>Pakistan</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>Bnagladesh</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>USA</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#"><i class="fas fa-arrow-right"></i>home</a>
                <a href="#"><i class="fas fa-arrow-right"></i>featured</a>
                <a href="#"><i class="fas fa-arrow-right"></i>arrivals</a>
                <a href="#"><i class="fas fa-arrow-right"></i>review</a>
                <a href="#"><i class="fas fa-arrow-right"></i>blogs</a>
                
            </div>
            <div class="box">
                <h3>extra links</h3>
                <a href="#"><i class="fas fa-arrow-right"></i>account info</a>
                <a href="#"><i class="fas fa-arrow-right"></i>ordered items</a>
                <a href="#"><i class="fas fa-arrow-right"></i>privacy policy</a>
                <a href="#"><i class="fas fa-arrow-right"></i>payment method</a>
                <a href="#"><i class="fas fa-arrow-right"></i>our services</a>
                
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i>9866658013</a>
                <a href="#"><i class="fas fa-telephone"></i>01-4912651</a>
                <a href="#"><i class="fas fa-phone"></i>rubinkarki2@gmail.com</a>
                <img src="world-map.gif" class="map" alt="">
                
                
                
            </div>
        </div>


        
        <div class="share">
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-youtube"></a>
        </div>
    

            

    </section>


    

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="buyer_dashboard.js"></script>
    <!-- Place this JavaScript code at the bottom of your HTML, just before the closing </body> tag -->


</body>
</html>