<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbuy";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data from the database
$sql = "SELECT id, name, price, image_url, category_id FROM products";

$sql_1 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 1";

$sql_2 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 2";

$sql_3 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 3";

$sql_4 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 4";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category']) && $_POST['category']!= "") {
    $category_id = $_POST['category'];
    if ($category_id == "1") {
        $result = $conn->query($sql_1);
    } elseif ($category_id == "2") {
        $result = $conn->query($sql_2);
    } elseif ($category_id == 3) {
        $result = $conn->query($sql_3);
    } elseif ($category_id == 4) {
        $result = $conn->query($sql_4);
    } else {
        $result = $conn->query($sql);
    }
}

else {
    $result = $conn->query($sql);
}

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

else {
    echo "No products found";
}


$conn->close();

?>


        <?php foreach ($products as $product) : ?>
            <div class="flex flex-col items-start p-4 bg-white rounded-md shadow-md">
                <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="h-52 w-full object-contain object-center">
                <div class="flex flex-col items-start p-2">
                    <h3 class="text-lg font-semibold"><?php echo $product['name']; ?></h3>
                    <p class="text-gray-500">$<?php echo number_format($product['price'], 2); ?></p>
                    <a href="#" class="inline-block px-4 mt-4 py-2 text-white bg-qb hover:bg-blue-600 rounded-md">Add to Cart</a>
                </div>
            </div>
        <?php endforeach; ?>
