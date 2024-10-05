<?php

require '../backend/db_connect.php';

// Fetch product data from the database
$sql = "SELECT id, name, price, image_url, category_id FROM products";

$sql_1 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 1";

$sql_2 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 2";

$sql_3 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 3";

$sql_4 = "SELECT id, name, price, image_url, category_id FROM products WHERE category_id = 4";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category']) && $_POST['category']!= "") {
    $category_id = $_POST['category'];
    if ($category_id == "1") {
        $result = $con->query($sql_1);
    } elseif ($category_id == "2") {
        $result = $con->query($sql_2);
    } elseif ($category_id == 3) {
        $result = $con->query($sql_3);
    } elseif ($category_id == 4) {
        $result = $con->query($sql_4);
    } else {
        $result = $con->query($sql);
    }
}

else {
    $result = $con->query($sql);
}

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "No products found";
}


$con->close();
?>


<?php foreach ($products as $product) : ?>
    <a href="./product.php?product_id=<?php echo $product['id']?>" class="md:hover:-translate-y-1 transition">
        <div class="flex flex-col items-start p-4 bg-white rounded-md shadow-md">
            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="h-52 w-full object-contain object-center">
            <div class="flex flex-col items-start p-2">
                <h3 class="text-lg font-semibold"><?php echo $product['name']; ?></h3>
                <p class="text-gray-500">$<?php echo number_format($product['price'], 2); ?></p>
            </div>
        </div>
    </a>
<?php endforeach; ?>
