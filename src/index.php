<?php
session_start();
$loggedIn = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedIn = true;
} else {
    $loggedIn = false;
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
    <section class="hero bg-cover bg-center flex items-center h-screen">
        <div class="container space-y-4 mx-auto px-4 py-20 text-center">
            <img src="assets/isoLogo.svg" alt="logo" class="h-28 mx-auto">
            <h1 class="text-4xl xl:text-5xl font-bold text-black">Welcome to Quickbuy</h1>
            <p class="text-lg xl:text-xl mb-8 text-gray-600">Discover a wide range of products from top brands.</p>
            <a href="#nav" class="inline-block xl:text-xl px-8 py-4 text-white bg-qb md:hover:bg-blue-600 rounded-md">Shop Now</a>
            <svg class="mx-auto pt-12 animate-bounce" width="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path style="fill:#232326" d="m18.294 16.793-5.293 5.293V1h-1v21.086l-5.295-5.294-.707.707L12.501 24l6.5-6.5-.707-.707z"/></svg>
        </div>
    </section>
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
        <section class="mt-12">
            <div>
                <div>
                <form hx-post="views/load_products.php" hx-target="#productWrapper" hx-swap="innerHTML" class="flex justify-between px-4">
                    <select name="category" id="category" class="px-2 w-56 py-1 border-2 focus-visible:border-qb border-qb rounded-md">
                        <option value="a" disabled selected>Select a Category:</option>
                        <hr>
                        <option value="1">Shoes</option>
                        <option value="2">Electronics</option>
                        <option value="3">Food & Drinks</option>
                        <option value="4">Sports Equipment</option>
                    </select>
                    <div>
                        <button type="submit" class="inline-block px-4 py-2 text-white bg-qb md:hover:bg-blue-600 rounded-md">Filter</button>
                        <button hx-get="views/load_products.php" hx-swap="innerHTML" hx-target="#productWrapper" onclick="document.getElementById('category').value = 'a'" class="inline-block px-4 py-2 text-white bg-red-500 md:hover:bg-red-600 rounded-md">Remove Filters</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 mt-12 gap-4" id="productWrapper">
                <div hx-get="views\load_products.php" hx-swap="outerHTML" hx-trigger="load">
                    
                </div>
            </div>
        </section>
    </main>
    <footer class="p-4 w-full">
        <div class="flex justify-center text-sm mb-1">
            <span>&copy; 2024 Quickbuy All Rights Reserved</span>
        </div>
    </footer>
</body>

</html>