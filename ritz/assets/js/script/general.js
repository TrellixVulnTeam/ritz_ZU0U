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
            loop:true,
            spaceBetween: 32,
            slidesPerView: 4,
            slidesPerGroup: 1,
            // autoplay: {
            //     delay: 2500,
            //     disableOnInteraction: false,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });


    }

    /**
     * Init
     */
    return {
        init: function () {
            Header();
            Favorites();

        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();

});


