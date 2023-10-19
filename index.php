<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="indexstyle.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="title">
            <h1>Product List</h1>
        </div>
        
        <div class="add-button-container">
            <a href="addproduct.php" class="add-button">ADD</a>
        </div>
       
        <div class="mass-delete-button">
            <button id="delete-product-btn">MASS DELETE</button>
        </div>
        
    </div>

    <div class="scrollable-container">
        <?php
        include 'database.php'; 
        ?>
    </div>

    <div class="footer">
        <p>Scandiweb Test Assignment</p>
    </div>
    
    <script src="delete.js"></script>
</body>
</html>