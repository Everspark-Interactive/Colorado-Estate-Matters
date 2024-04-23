jQuery(document).ready(function($){
    $('#blog-categories-filter').on('change', function() {
        var selectedOption = $(this).val();
        window.location.href = selectedOption;
    });
});