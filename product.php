<?php
class product {
    private $sku;
    private $name;
    private $price;
    private $attribute;

    public function __construct($sku, $name, $price, $attribute) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
    }

    public function render($productId, $isDeleted) {
        $deleteCheckboxClass = $isDeleted ? 'deleted' : '';
        $checkbox = $isDeleted ? '' : '<input type="checkbox" class="delete-checkbox" name="selected_products[]" value="' . $this->sku . '">';

        return "
            <div class='product-item' id='product_$productId'>
                <div class='delete-checkbox $deleteCheckboxClass'>
                    $checkbox
                </div>    
                <div class='text-items'>
                    <p> {$this->sku}</p>
                    <p> {$this->name}</p>
                    <p> {$this->price}</p>
                    <p> {$this->attribute}</p>
                </div>
            </div>
        ";
    }
}
?>

