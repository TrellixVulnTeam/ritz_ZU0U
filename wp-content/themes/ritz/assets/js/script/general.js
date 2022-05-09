/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {

    /**
     * Header
     */


    const Header = function () {

        /**
         * Navbar Menu
         */
       $('.navbar-toggler').on('click',function (){
         $('#menu-main-menu').toggleClass('d-block');
       });


    }

    /**
     * Slider
     * @constructor
     */
    const Favorites = function () {
        const swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            slidesPerView: 2,
            spaceBetween: 16,
            slidesPerGroup: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {

                768: {
                    slidesPerView: 4,
                    slidesPerGroup: 1,
                    spaceBetween: 32,

                }
            }
        });


    }
    const RelatedProducts = function () {
        const swiper = new Swiper(".swiper_related", {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            spaceBetween: 16,
            slidesPerView: 2,
            slidesPerGroup: 1,
            breakpoints: {

                768: {
                    slidesPerView: 4,
                    slidesPerGroup: 1,
                    spaceBetween: 32,

                }
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });


    }

    const ProductSwatches = function(){
        $(document).on('change', '.variation-radios input', function() {
            $('.variation-radios input:checked').each(function(index, element) {
                var $el = $(element);
                var thisName = $el.attr('name');
                var thisVal  = $el.attr('value');
                $('select[name="'+thisName+'"]').val(thisVal).trigger('change');

            });

        });
        $(document).on('woocommerce_update_variation_values', function() {
            $('.variation-radios input').each(function(index, element) {
                var $el = $(element);
                var thisName = $el.attr('name');
                var thisVal  = $el.attr('value');
                $el.removeAttr('disabled');
                if($('select[name="'+thisName+'"] option[value="'+thisVal+'"]').is(':disabled')) {
                    $el.prop('disabled', true);
                }
            });
        });

    }

    /**
     * Init
     */
    return {
        init: function () {
            Header();
            Favorites();
            RelatedProducts();
            ProductSwatches();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();

});


