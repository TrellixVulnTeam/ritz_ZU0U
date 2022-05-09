<?php
/*
 * Home: Categories
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field      = get_query_var( 'home_field' );
$categories = $field['categories_grid'];
?>

<section class="home__categories section">
    <div class="container">
        <div class="home__categories-row row">
			<?php
			if ( $categories ):
				foreach ( $categories as $category ):
					$thumbnail_id = get_woocommerce_term_meta( $category,
						'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					// print the IMG HTML for parent category
					$term = get_term_by( 'id', $category, 'product_cat' );
					$link = get_term_link( $category, 'product_cat' );
					?>
                    <div class="home__categories-row-col col-md-6 col-sm-12 ">
	                    <a href="<?=$link?>" target="_blank">
                        <div class="home__categories-row-col-card card bg-dark text-white border-0 rounded-0">
                            <img src="<?= $image ?>" alt="" width="400"
                                 height="400"
                                 class="card-img border-0 rounded-0"/>
                            <div class="card-img-overlay p-5">
                                <h5 class="card-title text-white"><?= $term->name ?></h5>
                                <p class="card-text"><?= __( 'Shop', 'ritz' )
								                         . ' '
								                         . $term->name ?><?= file_get_contents( get_stylesheet_directory()
								                                                                . "/assets/userfiles/right-arrow.svg" ); ?></p>
                            </div>
                        </div></a>
                    </div>


				<?php
				endforeach;
			endif;
			?>
        </div>
    </div>

</section>