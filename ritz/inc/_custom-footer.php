<?php
defined( 'ABSPATH' ) || exit;


/**
 * @ritz_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'ritz_footer_TagFooterOpen', 20 );
function ritz_footer_TagFooterOpen() {
	?>
    <!-- FOOTER -->
    <footer class="footer pt-4 my-md-5 pt-md-5 border-top">
    <div class="container">

	<?php
}

;
/**
 * @ritz_footer_TagFooterInner
 */
add_action( 'footer_parts', 'ritz_footer_TagFooterInner', 30 );
function ritz_footer_TagFooterInner() {
	$logo           = get_field( 'alt_logo', 'theme_settings' );
	$company_logo   = get_stylesheet_directory()
	                  . '/assets/userfiles/think-logo.svg';
	$global_socials = get_field( 'global_socials', 'theme_settings' );
	?>

    <div class="footer__row row">
        <div class="footer__row-col col-12 col-md-4">
            <img class="mb-2" src="<?= $logo ?>"
                 alt="">
        </div>
		<?php

		if ( function_exists( 'dynamic_sidebar' )
		) : ?>
            <div class="footer__row-col col-md-2 col-6">

				<?php
				dynamic_sidebar( 'footer-col-1' );

				?>        </div>
		<?php
		endif;

		if ( function_exists( 'dynamic_sidebar' )

		) : ?>
            <div class=" footer__row-col col-md-2 col-6">

				<?php
				dynamic_sidebar( 'footer-col-2' );

				?>        </div>
		<?php
		endif;

		if ( function_exists( 'dynamic_sidebar' )
		) : ?>
            <div class="footer__row-col col-md-2 col-6">

				<?php
				dynamic_sidebar( 'footer-col-3' );

				?>        </div>
		<?php
		endif;
		if ( function_exists( 'dynamic_sidebar' )
		) :
			?>
            <div class="footer__row-col col-md-2 col-6">

				<?php
				dynamic_sidebar( 'footer-col-4' );

				?>        </div>
		<?php
		endif;
		?>

    </div>
    <div class="footer__hr position-relative">
        <hr class="position-absolute">
    </div>
    <div class="footer__subfooter d-flex py-4 my-4">
        <div class="col-12 col-md-9 footer__subfooter-left d-flex align-items-center ">
            <p class="m-0"><?= __( '©2022 Ritz Kayaks Marine', 'ritz' ) ?></p>
            <ul class="list-unstyled  col-auto">
				<?php
				if ( have_rows( 'social_icons', 'theme_settings' ) ):
					foreach ( $global_socials as $social ):

						$link = $social['link']['url'];
						$icon = $social['icon'];
						?>
                        <li class="home__hero-card-socials-list-item list-group-item border-0 rounded-0 p-0 bg-transparent ml-2">

                            <a href="<?= $link ?>"><?= file_get_contents( $icon['url'] ) ?></a>
                        </li>

					<?php
					endforeach;
				endif;
				?>
            </ul>
        </div>
        <div class="col col-auto footer__subfooter-right d-flex align-items-center">
            <p class="m-0"><span
                        class="d-inline-block mx-2"><?= __( 'Designed and Developed by ',
						'ritz' ) ?></span><a
                        href="#"
                        class="d-inline-block"><?= file_get_contents( $company_logo ) ?></a>
            </p>

        </div>
    </div>
	<?php
}

;
/**
 * @ritz_footer_TagFooterClose
 */
add_action( 'footer_parts', 'ritz_footer_TagFooterClose', 100 );
function ritz_footer_TagFooterClose() {
	?>        </div>

    </footer>
    <!-- END FOOTER -->
	<?php
}

;
