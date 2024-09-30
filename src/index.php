<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickbuy</title>
    <link rel="shortcut icon" href="assets/isologo.svg" type="image/x-icon">
    <link rel="stylesheet" href="public/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
</head>
<body class="bg-gray-50">
    <header class="sticky h-fit w-full shadow-md ">
        <nav class="flex justify-between items-center p-6 py-2 bg-white">
            <div>
                <a href="index.php">
                    <img src="assets/fullLogo.svg" alt="logo" class="h-16 select-none">
                </a>
            </div>
            <div class="flex gap-4 text-lg">
                <a href="#" class="md:hover:underline underline-offset-6">Login</a>
                <a href="#" class="md:hover:underline underline-offset-6">Sign Up</a>
            </div>
        </nav>
    </header>
    <main class="p-2">
        <section class="pt-20">
            <div>
                <div>
                    <select name="category" id="category" placeholder="c" class="px-2 w-56 py-1 border-2 border-black focus-visible:border-qb rounded">
                        <option value="" disabled selected>Select a Category:</option>
                        <option value="shoes">Shoes</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Food">Food & Drinks</option>
                        <option value="sports">Sports Equipment</option>
                    </select>
                </div>
                <div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
