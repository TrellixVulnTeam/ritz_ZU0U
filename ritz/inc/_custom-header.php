<?php
defined( 'ABSPATH' ) || exit;
/**
 * @ritz_header_TagHeaderOpen
 */
add_action( 'header_parts', 'ritz_header_TagHeaderOpen', 10 );
function ritz_header_TagHeaderOpen() {
	?>
    <!-- HEADER -->
    <header class="header position-absolute w-100">
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
        <div class="header__row d-flex ">

            <!-- left -->
            <div class="header__row-left d-flex me-lg-auto ">

                <!-- logo -->

                <!-- end logo -->
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <div class="container-fluid">
                        <a href="<?= home_url() ?>"
                           class="header__logo navbar-brand">
                            <img
                                    src="<?= get_field( 'logo',
										'theme_settings' ) ?>"
                                    alt="<?= get_bloginfo( 'name' ) ?>"
                                    title="<?= get_bloginfo( 'name' ) ?>"
                            >
                        </a>
                        <button class="navbar-toggler" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- menu -->
						<?php
						/*
						 * Args Nav Menu
						 */
						$args = array(
							'theme_location'  => 'main_menu',
							'container'       => 'nav',
							'container_class' => 'header__menu',
							'menu_class'      => 'header__menu-list navbar-nav me-auto mb-2 mb-lg-0',
						);
						wp_nav_menu( $args );
						?>
                        <!-- end menu -->
                    </div>
                </nav>

            </div>
            <!-- end left -->

            <!-- right -->
            <div class="header__row-right">


                <ul class="list-group list-group-horizontal ">
                    <li class="list-group-item bg-transparent"><a
                                href="#"><?= file_get_contents( get_stylesheet_directory()
					                                            . "/assets/userfiles/Search.svg" ); ?></a>
                    </li>
                    <li class="list-group-item bg-transparent"><a
                                href="#"><?= file_get_contents( get_stylesheet_directory()
					                                            . "/assets/userfiles/Profile.svg" ); ?></a>
                    </li>
                    <li class="list-group-item bg-transparent">    <a href="#"><?= file_get_contents( get_stylesheet_directory()
                                                                                       . "/assets/userfiles/Cart.svg" ); ?></a></li>
                </ul>
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
