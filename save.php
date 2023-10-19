<?php
include_once 'product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new mysqli('localhost', 'id21351574_juniortestrs', 'Viesis123#', 'id21351574_juniortestrs');

    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];

    $checkSkuQuery = "SELECT COUNT(*) FROM products WHERE sku = ?";
    $stmtCheckSku = $db->prepare($checkSkuQuery);
    $stmtCheckSku->bind_param("s", $sku);
    $stmtCheckSku->execute();
    $stmtCheckSku->bind_result($count);
    $stmtCheckSku->fetch();
    $stmtCheckSku->close();

    if ($count > 0) {
        echo 'Error: SKU already exists. Please use a unique SKU.';
        $db->close();
        exit;
    }

    $attributeName = '';
    $attributeValue = '';

    if ($productType === 'DVD') {
        $size = isset($_POST['size']) ? $_POST['size'] : '';
        $attributeName = 'Size';
        $attributeValue = $size . ' MB';
    } elseif ($productType === 'Book') {
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        $attributeName = 'Weight';
        $attributeValue = $weight . ' Kg';
    } elseif ($productType === 'Furniture') {
        $width = isset($_POST['width']) ? $_POST['width'] : '';
        $length = isset($_POST['length']) ? $_POST['length'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $attributeName = 'Dimension';
        $attributeValue = $height . 'x' . $width . 'x' . $length;
    }

    $sql = "INSERT INTO products (sku, name, price, attribute_name, attribute_value) VALUES (?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssdss", $sku, $name, $price, $attributeName, $attributeValue);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Error saving the product: ' . $db->error;
    }

    $stmt->close();
    $db->close();
} else {
    header('Location: index.php');
    exit;
}


