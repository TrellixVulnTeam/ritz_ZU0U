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
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function () {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function () {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function () {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
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
            spaceBetween: 32,
            slidesPerView: 4,
            slidesPerGroup: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });


    }
    const RelatedProducts = function () {
        const swiper = new Swiper(".swiper_related", {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            spaceBetween: 32,
            slidesPerView: 4,
            slidesPerGroup: 1,

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


