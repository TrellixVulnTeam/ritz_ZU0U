const Admin = function () {

    const ProductType = function () {
        jQuery(document).ready(function () {
            jQuery('#general_product_data .pricing').addClass('show_if_ritz_performance_touring');
        });
    }
    return {
        init: function () {
            ProductType();
        }
    };
}();
jQuery(document).ready(function () {
    Admin.init();

});
