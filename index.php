<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: login3.php");
}
if(isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    switch($role) {
        case "buyer":
            header("Location: buyer_dashboard.php");
            exit(); 
            break;
        case "admin":
            header("Location: admin_page.php");
            exit(); 
            break;
        default:
            
            header("Location: index.php");
            exit();
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="login2.css">
        
        
</head>
<body>
<a href="logout.php" class="btn btn-warning">LogOut</a>
</body>
</html>