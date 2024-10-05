<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Quickbuy</title>
    <link rel="shortcut icon" href="assets/isologo.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
    <link href="styles/main.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <header class="fixed top-0 h-fit w-full shadow-md h-12 bg-gray-50" id="nav">
        <nav class="flex justify-between items-center p-6 py-2 ">
            <div>
                <a href="index.php">
                    <img src="assets/fullLogo.svg" alt="logo" class="h-16 select-none">
                </a>
            </div>
            <div class="flex gap-4 text-lg items-center">
                <a href="login.php" class="md:hover:underline underline-offset-6 ">Login</a>
                <a href="index.php" class="md:hover:underline underline-offset-6">Home</a>
            </div>
        </nav>
    </header>
    <section>
        <div class="flex justify-center items-center pt-6 h-screen w-full">
            <div class="bg-white rounded-md shadow-md p-6 mx-4 w-full max-w-80">
                <img src="assets/isologo.svg" alt="logo" width="60" height="60" class="mx-auto mb-4">
                <h1 class="text-3xl text-center font-bold">Sign Up</h1>
                <form action="backend/reg_user.php" method="post" autocomplete="on" class="mt-4 space-y-2">
                    <!-- Name -->
                    <div class="flex flex-col gap-1">
                        <label for="username">Name</label>
                        <input type="text" name="username" id="username" required minlength="4" maxlength="20" class="border-2 border-black outline-none p-1 rounded focus-visible:border-qb transition">
                    </div>
                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required minlength="2" maxlength="200" class="border-2 border-black outline-none p-1 rounded focus-visible:border-qb transition">
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required minlength="5" maxlength="20" class="border-2 border-black outline-none p-1 rounded focus-visible:border-qb transition">
                    </div>
                    <button type="submit" class="inline-block xl:text-lg px-8 py-1 w-full text-white bg-qb md:hover:bg-blue-600 rounded-md">Register</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>