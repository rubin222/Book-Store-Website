<?php


session_start();

if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}

if(isset($_SESSION["user"])){
    header("Location: login3.php");
    exit; // Add an exit to stop further execution
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login2.css">
</head>
<body>
    
    <div class="container">
        <h1>Login Page</h1>
        <?php
        if(isset($_POST["login"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            $role=$_POST["role"]; 
            require_once "database.php";
            $sql= "SELECT * FROM users WHERE email='$email' AND role='$role'"; 
            $result=mysqli_query($conn,$sql);
            $user= mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"]="yes";
                    $_SESSION["role"]=$role; 
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email or role does not exist</div>"; 
            }
        }
        ?>
        <form action="login3.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter password:" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Select your role:</label> 
                <select class="form-control" id="role" name="role">
                    <option value="buyer">Buyer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>Not registered yet<a href="login2.php">Register here</a></div>
    </div>
</body>
</html>

