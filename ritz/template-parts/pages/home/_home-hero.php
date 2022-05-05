<?php
/*
 * Home: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field    = get_query_var( 'home_field' );
$bg_image = $field['bg_image'];
$subtitle = $field['subtitle'];
$title    = $field['title'];
$socials  = $field['socials'];

$global_socials = get_field( 'global_socials', 'theme_settings' );
?>

<section class="home__hero section">
    <div class="home__hero-card card bg-dark text-white border-0">
        <img src="<?= $bg_image['url'] ?>" class="card-img border-0 rounded-0"
             alt="<?= $bg_image['alt'] ?>">
        <div class="card-img-overlay border-0 text-center top-50 w-50 mx-auto">
            <h5 class="card-subtitle text-white home__hero-card-subtitle">
                <span><?= $subtitle ?></span></h5>
            <h1 class="card-title text-white home__hero-card-title"><?= $title ?></h1>
        </div>
        <div class="home__hero-card-socials card-img-overlay border-0 text-center">
            <div class="container">

                <ul class="home__hero-card-socials-list list-group list-group-horizontal">

					<?php
					if ( have_rows( 'social_icons', 'theme_settings' ) ):
						foreach ( $socials as $social ):
							if ( $global_socials[ $social ] ):
								$link = $global_socials[ $social ]['link']['url'];
								$icon = $global_socials[ $social ]['icon'];
								?>
                                <li class="home__hero-card-socials-list-item list-group-item border-0 rounded-0 p-0 bg-transparent ml-2">

                                    <a href="<?= $link ?>"><?= file_get_contents( $icon['url'] ) ?></a>
                                </li>

							<?php
							endif;
						endforeach;
					endif;
					?>
                </ul>

            </div>

        </div>
    </div>
</section>