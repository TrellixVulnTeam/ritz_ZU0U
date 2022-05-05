<?php
defined( 'ABSPATH' ) || exit;
/**
 * @ritz_header_TagHeaderOpen
 */
add_action( 'header_parts', 'ritz_header_TagHeaderOpen', 10 );
function ritz_header_TagHeaderOpen() {
	?>
    <!-- HEADER -->
    <header class="header">
	<?php
}
/**
 * @ritz_header_TagHeaderInner
 */
add_action( 'header_parts', 'ritz_header_TagHeaderInner', 20 );
function ritz_header_TagHeaderInner() {
	?>

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="header__row">

            <!-- left -->
            <div class="header__row-left">

                <!-- logo -->
                <a href="<?= home_url() ?>" class="header__logo">
                    <img
                            src="<?= get_field( 'logo', 'theme_settings' ) ?>"
                            alt="<?= get_bloginfo('name') ?>"
                            title="<?= get_bloginfo('name') ?>"
                    >
                </a>
                <!-- end logo -->

            </div>
            <!-- end left -->

            <!-- right -->
            <div class="header__row-right">

                <!-- menu -->
				<?php
				/*
				 * Args Nav Menu
				 */
				$args = array(
					'theme_location'  => 'main_menu',
					'container'       => 'nav',
					'container_class' => 'header__menu',
					'menu_class'      => 'header__menu-list',
					'items_wrap'      => '<a href="'.home_url() .'" class="header__menu-logo-mobile"><img src=' . TEMPLATE_PATH . '/assets/images/logo_white.svg" alt="" title=""></a><ul class="%2$s">%3$s</ul>',
				);
				wp_nav_menu( $args );
				?>
                <!-- end menu -->
                <a class="header__btnmenu toggle-nav" href="#">&#9776;</a>
                <!-- button -->
                <div class="header__button">
                    <a
                            class="btn btn-gradient"
                            href="<?php echo get_field( 'button_candidate_url',
								get_option( 'page_on_front' ) ); ?>">
                        <span><?php echo get_field( 'button_candidate_text',
								get_option( 'page_on_front' ) ); ?></span>
                        <svg width="28" height="16" viewBox="0 0 28 16"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.7071 8.70711C28.0976 8.31658 28.0976 7.68342 27.7071 7.29289L21.3431 0.928932C20.9526 0.538408 20.3195 0.538408 19.9289 0.928932C19.5384 1.31946 19.5384 1.95262 19.9289 2.34315L25.5858 8L19.9289 13.6569C19.5384 14.0474 19.5384 14.6805 19.9289 15.0711C20.3195 15.4616 20.9526 15.4616 21.3431 15.0711L27.7071 8.70711ZM0 9H27V7H0V9Z"
                                  fill="white"/>
                        </svg>

                    </a>
                </div>
                <!-- end button -->

            </div>
            <!-- end right -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

	<?php
}

;
/**
 * @ritz_header_TagHeaderClose
 */
add_action( 'header_parts', 'ritz_header_TagHeaderClose', 30 );
function ritz_header_TagHeaderClose() {
	?>
    </header>
    <!-- END HEADER -->
	<?php
}

;
