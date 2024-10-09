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
    header("Location: index.php");
    exit();
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
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
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
                    <a href="backend/logout.php" class="md:hover:underline underline-offset-6">Logout</a>
                </div>
            <?php elseif (!$loggedIn): ?>
                <div class="flex gap-4 text-lg items-center">
                    <a href="login.php" class="md:hover:underline underline-offset-6 ">Login</a>
                    <a href="register.php" class="md:hover:underline underline-offset-6">Sign Up</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>
    <main class="container mx-auto p-4" x-data="{cart: $persist([]), current: 'Add to cart', added: false}" x-init=" if(cart.includes(<?php echo $product['id'] ?>)){current = 'Added!'; added = true} ">
        <div class="grid grid-cols-1 items-center mt-12 md:grid-cols-2">
            <div>
                <img class="md:w-2/3 w-5/6 max-w-80 px-2 mx-auto" src="<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>">
            </div>
            <div class="mt-6 space-y-4">
                <h2 class="font-bold text-xl mb-4"><?php echo $product['name'] ?></h2>
                <span class="text-gray-600">$<?php echo $product['price'] ?></span>
                <p class="text-lg"> <?php echo $product['description'] ?> </p>
                <button x-cloak x-text="current"  @click="if(!cart.includes(<?php echo $product['id'] ?>)){cart.push(<?php echo $product['id'] ?>)}; if(cart.includes(<?php echo $product['id'] ?>)){current = 'Added!'; added = true}" class="inline-block xl:text-lg px-8 py-3 text-white bg-qb md:hover:bg-blue-600 rounded-md">Add to cart</button>
                <!-- Delete Thingy-->
                <button x-cloak x-show="added" @click="cart = cart.filter(function(arr) { return arr  !== <?php echo $product['id'] ?>}); added = false; current = 'Add to cart'" class="inline-block xl:text-lg px-8 py-3 text-white bg-red-600 md:hover:bg-blue-600 rounded-md">Remove From Cart</button>
            </div>
        </div>
    </main>
</body>