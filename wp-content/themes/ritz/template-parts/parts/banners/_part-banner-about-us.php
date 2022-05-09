<?php
$bg_image = get_field( 'about_us_background_image', 'theme_settings' );
$subtitle = get_field( 'about_us_subtitle', 'theme_settings' );
$title    = get_field( 'about_us_title', 'theme_settings' );
$text     = get_field( 'about_us_text', 'theme_settings' );
$button   = get_field( 'about_us_button', 'theme_settings' );
?>
<section class="section__about-us section">
    <div class="section__about-us-card card text-white border-0">
        <img src="<?= $bg_image['url'] ?>" class="card-img border-0 rounded-0"
             alt="<?= $bg_image['alt'] ?>">
        <div class="section__about-us-overlay p-5 card-img-overlay bg-white">
            <h5 class="card-subtitle mb-5">
                <span><?= $subtitle ?></span></h5>
            <h3 class="card-titl"><?= $title ?></h3>
            <p class="card-text mb-5"><?= $text ?></p>
            <a class="button"
               href="<?= $button['url'] ?>"><?= $button['title'] ?></a>
        </div>
    </div>
</section>