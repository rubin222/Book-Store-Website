<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['add_product'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price']; // Fix typo here
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder ='Uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name='$name'") or die('query failed');
    if(mysqli_num_rows($select_product_name) > 0){
        $message[] = 'product name already added';
    }else{
        // Move the image upload code inside the condition where product is added successfully
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name,price,image) VALUES('$name','$price','$image')") or die('query failed');
        if($add_product_query){
            if($image_size > 2000000){
                $message[] = 'image size is too large';
            }else{
                // Move the image upload code inside this block
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'product added successfully';
            }
        }else{
            $message[] = 'product could not be added';
        }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query=mysqli_query($conn,"SELECT image FROM `products` WHERE id='$delete_id'") or die('query failed');
    mysqli_query($conn,"DELETE FROM `products` WHERE id='$delete_id'") or die('query failed');
    $fetch_delete_image= mysqli_fetch_assoc($delete_image_query);
    unlink('Uploaded_img/'.$fetch_delete_image['image']);
    header('location:admin_products.php');
}
if(isset($_POST['update_product'])){
    $update_p_id=$_POST['update_p_id'];
    $update_name=$_POST['update_name'];
    $update_price=$_POST['update_price'];

    // Check if a new image is uploaded
    if(isset($_FILES['update_image']['name']) && !empty($_FILES['update_image']['name'])) {
        $update_image=$_FILES['update_image']['name'];
        $update_image_tmp_name=$_FILES['update_image']['tmp_name'];
        $update_image_size=$_FILES['update_image']['size'];
        $update_folder='Uploaded_img/'.$update_image;

        // Update the product information including the image file path
        $update_query = mysqli_query($conn,"UPDATE `products` SET name='$update_name', price='$update_price', image='$update_image' WHERE id='$update_p_id'") or die('query failed');

        // Move the uploaded image to the appropriate folder
        move_uploaded_file($update_image_tmp_name, $update_folder);

        // Delete the old image file
        unlink('Uploaded_img/'.$_POST['update_old_image']);
    } else {
        // If no new image is uploaded, only update the product name and price
        $update_query = mysqli_query($conn,"UPDATE `products` SET name='$update_name', price='$update_price' WHERE id='$update_p_id'") or die('query failed');
    }

    header('location: admin_products.php');
}
?>

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
</head>
<body>
<header class="header">
    <div class="header-1">
        <a href="#" class="logo"> <i class="fas fa-book"></i>BookVerse</a>
    </div>
</header>
<section class="add-products">
    <h1 class="title">Shop Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Add product</h3>
        <input type="text" name="name" class="box" placeholder="Enter book name" required>
        <!-- Remove value="RS" from the price input field -->
        <input type="text" name="price" class="box" placeholder="Enter book price" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="Add product" name="add_product" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        <?php
        $select_products = mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
        if(mysqli_num_rows($select_products)>0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){ 
        ?>
        <div class="box">
            <img src="Uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price"><?php echo  $fetch_products['price']; ?></div>
            <a href="admin_products.php?update=<?php echo $fetch_products['id'];?>" class="option-btn">update</a>
            <a href="admin_products.php?delete=<?php echo $fetch_products['id'];?>" class="delete-btn" onclick="return confirm('delete this product?');" >delete</a>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">no product added yet!</p>';
        }
        ?>
    </div>
</section>
<section class="edit-product-form">
    <?php
    if(isset($_GET['update'])){
        $update_id=$_GET['update'];
        $update_query =mysqli_query($conn,"SELECT * FROM `products` WHERE id='$update_id'") or die('query failed');
        if(mysqli_num_rows($update_query)>0){
            while($fetch_update=mysqli_fetch_assoc($update_query)){
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
    <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
    <img src="Uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
    <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">

    <!-- Concatenate "RS" with the price -->
    <input type="text" name="update_price" value="<?php echo 'RS ' . $fetch_update['price']; ?>" class="box" required placeholder="Enter product price">

    <input type ="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
    <input type="submit" value="update" name="update_product" class="btn">
    <input type="reset" value="cancel" id="close-update" class="option-btn">
</form>
<?php
            }
        }
    } else {
        echo '<script>document.querySelector(".edit-product-form").style.display="none";</script>';
    }
    ?>
</section>
<script src="admin_script.js" defer></script>
</body>
</html>
