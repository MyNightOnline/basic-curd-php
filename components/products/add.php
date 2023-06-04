<?php

include '../../config/config.php';

$categoryQuery = "SELECT * FROM category";
$categoryResult = mysqli_query($conn, $categoryQuery);

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO products (product_name, product_price, product_quantity, category_id) VALUES ('$name', '$price', '$quantity', '$category')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location.href = '/views/product';";
        echo "</script>";
        exit();
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
}
?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">เพิ่มสินค้า</h1>
    <form method="post" action="" class="max-w-sm mx-auto">
        <div class="mb-4">
            <label class="required block mb-2">ชื่อสินค้า</label>
            <input required type="text" name="name" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="mb-4">
            <label class="required block mb-2">ประเภทสินค้า</label>
            <select required name="category" class="w-full border border-gray-300 rounded py-2 px-3">
                <option value="">ประเภทสินค้า</option>
                <?php
                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                    echo "<option value='" . $categoryRow['category_id'] . "'>" . $categoryRow['category_name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="required block mb-2">ราคา</label>
            <input required type="number" name="price" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="mb-4">
            <label class="required block mb-2">จำนวน</label>
            <input required type="number" name="quantity" class="w-full border border-gray-300 rounded py-2 px-3">
        </div>
        <div class="flex justify-center">
            <button type="submit" name="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                เพิ่มสินค้า
            </button>
        </div>
    </form>
</div>

<?php
mysqli_close($conn);
?>