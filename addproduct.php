<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="addstyle.css">
</head>
<body>
    <div class="header">
        <div class="title">
            <h1>Product List</h1>
        </div>
        
        <div class="button-container">
            <input type="submit" value="Save" class="add-button" form="product_form">
            <a href="index.php" class="cancel-button">Cancel</a>
        </div>
    </div>

    <div class="main-content">
    <form id="product_form" action="save.php" method="POST">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" required><br><br>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="price">Price ($):</label>
        <input type="number" name="price" id="price" required>
        <br><br> 

        <label for="productType">Type switcher:</label>
        <select name="productType" id="productType" required>
            <option value="DVD" id="DVD">DVD</option>
            <option value="Book" id="Book">Book</option>
            <option value="Furniture" id="Furniture">Furniture</option>
        </select><br><br>

        <div id="specificAttribute">
        </div><br>
        
        <div id="description"></div>
    </form>
    </div>

    <div class="footer">
        <p>Scandiweb Test Assignment</p>
    </div>

    <script src="product_form.js"></script>
</body>
</html>
