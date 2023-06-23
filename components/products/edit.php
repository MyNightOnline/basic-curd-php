<?php

include '../../config/config.php';

// Retrieve product ID from query string
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
} else {
    header("Location: /views/product");
    exit();
}

$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $categoryQuery = "SELECT * FROM category";
    $categoryResult = mysqli_query($conn, $categoryQuery);

    $row = mysqli_fetch_assoc($result);
    $product_name = $row["product_name"];
    $product_price = $row["product_price"];
    $product_quantity = $row["product_quantity"];
    $product_category_id = $row["category_id"];

    $category_sql = "SELECT * FROM category";
    $category_result = mysqli_query($conn, $category_sql);
} else {
    header("Location: /views/product");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = $_POST['quantity'];
    $category_id = $_POST['category'];

    $update_sql = "UPDATE products SET product_name = '$product_name', product_price = '$product_price', product_quantity = '$product_quantity', category_id = '$category_id' WHERE product_id = $product_id";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: /views/product");
        exit();
    } else {
        $error_message = "Error updating product: " . mysqli_error($conn);
    }
}

?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">แก้ไขสินค้า</h1>
    <form method="post" action="" class="max-w-sm mx-auto">
        <div class="mb-4">
            <label class="required block mb-2">ชื่อสินค้า</label>
            <input required type="text" name="name" value="<?php echo $product_name; ?>" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="mb-4">
            <label class="required block mb-2">ประเภทสินค้า</label>
            <select required name="category" class="w-full border border-gray-300 rounded py-2 px-3">
                <?php
                while ($category_row = mysqli_fetch_assoc($category_result)) {
                    $selected = ($category_row['category_id'] == $product_category_id) ? 'selected' : '';
                    echo "<option value='" . $category_row['category_id'] . "' $selected>" . $category_row['category_name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="required block mb-2">ราคา</label>
            <input required type="number" name="price" value="<?php echo $product_price; ?>" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="mb-4">
            <label class="required block mb-2">จำนวน</label>
            <input required type="number" name="quantity" value="<?php echo $product_quantity; ?>" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="flex justify-center">
            <button type="submit" name="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                แก้ไขสินค้า
            </button>
        </div>
    </form>
</div>

<?php
mysqli_close($conn);
?>