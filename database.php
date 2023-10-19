<?php
include_once 'product.php'; 

$db = new mysqli('localhost', 'id21351574_juniortestrs', 'Viesis123#', 'id21351574_juniortestrs');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$sql = "SELECT * FROM products WHERE deleted = 0";

$result = $db->query($sql);

if (!$result) {
    die("Error executing the query: " . $db->error);
}

$counter = 0; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product = new Product(
            $row['sku'],
            $row['name'],
            $row['price'],
            $row['attribute_name'] . ': ' . $row['attribute_value']
        );

        if ($counter % 4 === 0) {
            echo '<div class="product-row">';
        }

        echo $product->render($row['id'], false); 

        if ($counter % 4 === 3) {
            echo '</div>';
        }

        $counter++;
    }

    if ($counter % 4 !== 0) {
        echo '</div>';
    }
} else {
    echo "No products found.";
}

?>