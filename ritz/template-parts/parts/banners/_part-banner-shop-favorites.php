<?php
defined( 'ABSPATH' ) || exit;
$favorites = get_field( 'favorite_products', 'favorite_products' );


?>

<section class="section section__favorites">
    <div class="container">
        <div class="row section__favorites-row">
            <h4 class="fw-bold"><?= __( 'Our Favorites', 'ritz' ) ?></h4>
            <div class="section__favorites-row-swiper swiper mySwiper">
                <div class="section__favorites-row-swiper-nav">
                    <div class="section__favorites-row-swiper-button-prev swiper-button-prev d-inline-block"><?= file_get_contents( get_stylesheet_directory()
					                                                                                                                . "/assets/userfiles/left-arrow.svg" ); ?></div>
                    <div class="section__favorites-row-swiper-button-next swiper-button-next d-inline-block"><?= file_get_contents( get_stylesheet_directory()
					                                                                                                                . "/assets/userfiles/right-arrow.svg" ); ?></div>

                </div>
                <div class="section__favorites-row-swiper-wrapper swiper-wrapper">

					<?php foreach ( $favorites as $favorite ):
						$product = wc_get_product( $favorite->ID );
//
						?>
                        <div class="section__favorites-row-card card section__favorites-row-swiper-slide swiper-slide border-0">
                            <a href="<?= get_permalink( $favorite->ID ) ?>"
                               target="_blank">
                                <img class="section__favorites-row-card-img card-img-top border-3"
                                     src="<?= get_the_post_thumbnail_url( $favorite->ID ) ?>"
                                     alt="Card image cap">
                                <div class="section__favorites-row-card-body card-body text-start">
                                    <p class="section__favorites-row-card-text card-text">
										<?= the_field( 'product_type',
											$favorite->ID ) ?></p>
                                    <h5 class="section__favorites-row-card-title card-title fw-bold">
										<?= $favorite->post_title ?>
                                    </h5>
									<?php
									$currency = get_woocommerce_currency();

									$symbols
										= get_woocommerce_currency_symbols();

									$currency_symbol
										= isset( $symbols[ $currency ] )
										? $symbols[ $currency ] : '';
									?>
                                    <p class="section__favorites-row-card-text card-text"><?= $currency_symbol
									                                                          . ' '
									                                                          . $product->get_regular_price(); ?></p>

                                </div>
                            </a>
                        </div>

					<?php
					endforeach;
					?>

                </div>
            </div>
        </div>
    </div>
</section>