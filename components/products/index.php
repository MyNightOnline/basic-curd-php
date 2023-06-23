<?php

include '../../config/config.php';

// Fetch all products
$sql = "SELECT products.*, category.category_name
        FROM products
        INNER JOIN category ON products.category_id = category.category_id";
$result = mysqli_query($conn, $sql);

?>

<div class="max-w-7xl mx-auto mt-10">

    <div class="mb-3 flex justify-between items-center">
        <h1 class="text-2xl">รายการสินค้า</h1>
        <a type='button' href="/views/product/add.php" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
            เพิ่มสินค้า
        </a>
    </div>

    <table class="min-w-full">
        <thead>
            <tr>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider">ลำดับ</th>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider">ชื่อสินค้า</th>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider">ประเภทสินค้า</th>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider">ราคา</th>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider">จำนวน</th>
                <th class="text-center px-6 py-3 bg-gray-50 text-left font-medium text-gray-500 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='text-center hover:bg-slate-200'>";
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["category_name"] . "</td>";
                    echo "<td>" . $row["product_price"] . "</td>";
                    echo "<td>" . $row["product_quantity"] . "</td>";
                    echo "<td>
                                <a href='/views/product/edit.php?id=" . $row["product_id"] . "' type='button' class='bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded'>แก้ไข</a>
                                <a href='#' type='button' onclick='return confirmDelete(" . $row['product_id'] . ", \"" . $row['product_name'] . "\")' class='bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded'>ลบ</a>
                              </td>";
                    echo "</tr>";
                    $index++;
                }
            } else {
                echo "<tr><td colspan='5'>No products found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id, name) {
        if (confirm(`คุณแน่ใจว่าต้องการลบ '${name}' หรือไม่ ?`)) {
            console.log('love', id)
            window.location.href = `/components/products/delete.php?id=${id}`
        }
    }
</script>

<?php $conn->close(); ?>