<?php
include 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['skus'])) {
    $skus = $_POST['skus'];

    $skuList = "'" . implode("', '", $skus) . "'";
    $sql = "UPDATE products SET deleted = 1 WHERE sku IN ($skuList)";

    if ($db->query($sql) === TRUE) {
        echo 'Marked as deleted';
    } else {
        echo 'Error: ' . $db->error;
    }
} else {
    echo 'Invalid request';
}
?>
