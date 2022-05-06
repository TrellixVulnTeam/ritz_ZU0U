<?php

$icon_mail = get_stylesheet_directory()
             . '/assets/userfiles/email-arrow.svg';

if ( get_field( 'newsletter_banner', 'theme_settings' ) ):
	?>
    <section class="section section__newsletter">
        <div class="container">
            <div class="section__newsletter-row row justify-content-between align-items-center p-5"
                 style="background: url('<?php the_field( 'newsletter_banner',
				     'theme_settings' ) ?>');background-size:cover;background-repeat: no-repeat ">

                <div class="col-4 section__newsletter-row-card card bg-transparent border-0 rounded-0">
                    <div class="section__newsletter-row-card-body card-body">
                        <h5 class="section__newsletter-row-card-title card-title text-white"><?php the_field( 'newsletter_title',
								'theme_settings' ) ?></h5>
                        <p class="section__newsletter-row-card-text card-text text-white"><?php the_field( 'newsletter_text',
								'theme_settings' ) ?></p>
                    </div>
                </div>
                <div class="col-5 card section__newsletter-row-card bg-transparent border-0 rounded-0">
                    <div class="card-body section__newsletter-row-card-body ">
                        <form>
                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <input type="email"
                                           class="form-control bg-transparent border-right-0"
                                           placeholder="Email Address"
                                           aria-label="Recipient's username"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn bg-transparent "
                                                type="button"><?= file_get_contents( $icon_mail ); ?></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php
endif;
?>
