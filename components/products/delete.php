<?php

include '../../config/config.php';

if (isset($_GET["id"])) {

    $productId = $_GET["id"];

    $sql = "DELETE FROM products WHERE product_id = '$productId'";
    if (mysqli_query($conn, $sql)) {
        header("Location: /views/product");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid product ID.";
}
