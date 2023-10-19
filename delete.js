function initializeDeleteScript() {
    function massDelete() {
        var selectedSkus = [];
        var $deleteCheckboxes = $('.delete-checkbox input[type="checkbox"]:checked');

        
        $deleteCheckboxes.closest('.delete-checkbox').addClass('deleted');

        $deleteCheckboxes.each(function () {
            var sku = $(this).val(); 
            if (sku !== undefined) {
                selectedSkus.push(sku);
            } else {
                console.error('Invalid SKU for checkbox:', this);
            }
        });

        console.log('Selected SKUs:', selectedSkus);

        $.ajax({
            url: 'delete.php', 
            method: 'POST',
            data: { skus: selectedSkus }, 
            success: function (response) {
               
                console.log('Delete successful:', response);

                $('.scrollable-container').load('database.php');  
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

    $(document).on('click', '#delete-product-btn', function () {
        massDelete();
    });
}

$(document).ready(initializeDeleteScript);
