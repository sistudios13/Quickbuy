<?php

require 'backend/db_connect.php';

session_start();
$loggedIn = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

$item_id = $_GET['product_id'];

$stmt = $con->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param('i', $item_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();


if ($result->num_rows <= 0) {
    exit('Product Does not exist!');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickbuy</title>
    <link rel="shortcut icon" href="assets/isologo.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
    <link href="styles/main.css" rel="stylesheet">
    <script src="https://unpkg.com/htmx.org@2.0.2" ></script>
</head>

<body class="bg-gray-50">
<header class="sticky top-0 h-fit w-full shadow-md h-12 bg-gray-50 z-10" id="nav">
        <nav class="flex justify-between items-center p-6 py-2 ">
            <div>
                <a href="index.php">
                    <img src="assets/fullLogo.svg" alt="logo" class="h-16 select-none">
                </a>
            </div>
            
            <?php if($loggedIn): ?>
                <div class="flex gap-4 text-lg items-center">
                    <a href="#"><img src="assets/shopping-cart.svg" alt="cart" class="h-6 md:hover:scale-110 transition"></a>
                    <a href="logout.php" class="md:hover:underline underline-offset-6">Logout</a>
                </div>
            <?php elseif (!$loggedIn): ?>
                <div class="flex gap-4 text-lg items-center">
                    <a href="login.php" class="md:hover:underline underline-offset-6 ">Login</a>
                    <a href="register.php" class="md:hover:underline underline-offset-6">Sign Up</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>
    <main class="container mx-auto p-2">
        <div class="flex flex-col mt-12">
            <div>
                <img class="md:w-2/3 px-2" src="<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>">
            </div>
            <div class="mt-6 space-y-4">
                <h2 class="font-bold text-xl mb-4"><?php echo $product['name'] ?></h2>
                <span class="text-gray-600"><?php echo $product['price'] ?></span>
                <p class="text-lg"> <?php echo $product['description'] ?> </p>
                <button class="inline-block xl:text-lg px-8 py-3 text-white bg-qb md:hover:bg-blue-600 rounded-md">Add to cart</button>
            </div>
        </div>
    </main>
</body>