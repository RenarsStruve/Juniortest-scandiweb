document.addEventListener("DOMContentLoaded", function() {
    var productTypeSelect = document.getElementById("productType");
    var specificAttributeDiv = document.getElementById("specificAttribute");
    var descriptionDiv = document.getElementById("description");
    var productForm = document.getElementById("productForm");

    var productTypeAttributes = {
        DVD: '<label for="size">Size (MB):</label><input type="number" id="size" name="size" required><br><br>',
        Book: '<label for="weight">Weight (Kg):</label><input type="number" id="weight" name="weight" required><br><br>',
        Furniture: '<label for="width">Width (CM):</label><input type="number" id="width" name="width" required><br><br>' +
            '<label for="length">Length (CM):</label><input type="number" id="length" name="length" required><br><br>' +
            '<label for="height">Height (CM):</label><input type="number" id="height" name="height" required><br><br>',
    };

    var productTypeDescriptions = {
        DVD: 'Please provide size in MB.',
        Book: 'Please provide weight in Kg.',
        Furniture: 'Please provide dimensions in HxWxL format (CM).',
    };

    productTypeSelect.addEventListener("change", function() {
        var selectedProductType = productTypeSelect.value;
        specificAttributeDiv.innerHTML = productTypeAttributes[selectedProductType] || '';
        descriptionDiv.innerHTML = productTypeDescriptions[selectedProductType] || '';
    });

    var defaultProductType = "DVD"; 
    productTypeSelect.value = defaultProductType;
    var event = new Event("change");
    productTypeSelect.dispatchEvent(event);

    productForm.addEventListener("submit", function(event) {
        var selectedProductType = productTypeSelect.value;
        var attributeInputs = {
            DVD: "size",
            Book: "weight",
            Furniture: "width length height"
        };

        var attributes = attributeInputs[selectedProductType].split(" ");
        attributes.forEach(function(attribute) {
            var inputElement = document.createElement("input");
            inputElement.type = "hidden";
            inputElement.name = attribute;
            inputElement.value = document.getElementById(attribute).value;
            productForm.appendChild(inputElement);
        });
    });
});
