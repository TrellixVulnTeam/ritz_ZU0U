<?php
// the query
$posts_count = get_field( 'posts_settings', 'post_settings' );
//$posts_count = get_option( 'journals_count', 'post_settings' );
//print_r( $posts_count['journals_count'] );

$icon_arrow = get_stylesheet_directory() . '/assets/userfiles/right-arrow.svg';

$the_query = new WP_Query( array(
	'posts_per_page' => $posts_count['journals_count'],
) );
?>

<?php if ( $the_query->have_posts() ) : ?>
    <section class="section section__keep-updated background__grey-f6">
        <div class="container">
            <div class="row section__keep-updated-row justify-content-between">
                <div class="col-auto">
                    <h4 class="fw-bold"><?= __( 'Keep Updated', 'ritz' ) ?></h4>
                </div>
                <div class="col-auto">
                    <a href="#" class="button btn desc-display mobile-hide"><?= __( 'See more',
							'ritz' ) ?></a>
                    <a href="#" class="mobile-display desc-hide"><?= file_get_contents($icon_arrow); ?></a>
                </div>
                <div class="section__keep-updated-row  row">
                    <div class="section__keep-updated-card-deck card-deck d-flex bg-transparent">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="section__keep-updated-card card border-0 rounded-0
                            <?php if ( ( $posts_count['journals_count'] == 1 ) ):echo 'col-md-12';elseif ( ( $posts_count['journals_count'] == 2 ) ):echo 'col-md-6';elseif ( ( $posts_count['journals_count'] == 3 ) ):echo 'col-md-4';elseif ( ( $posts_count['journals_count'] == 4 ) ):echo 'col-md-3';else:echo 'col-md-4';endif; ?> col-12 bg-transparent">
                                <a href="<?= get_permalink() ?>"
                                   target="_blank">
									<?php the_post_thumbnail( 'post-thumbnail',
										array(
											'class' => 'section__keep-updated-img card-img-top border-0 rounded-0',
											'alt'   => esc_html( get_the_title() )
										) );
									?>

                                    <div class="section__keep-updated-card-body card-body ">

                                        <p class="section__keep-updated-card-text card-text">
                                        <span
                                        ><?= get_the_category( get_the_ID() )[0]->name ?></span>
                                            <small><?= get_the_date( 'd M, Y' ); ?></small>
                                        </p>
                                        <h5 class="section__keep-updated-card-title card-title">                            <?php the_title(); ?></h5>

                                    </div>
                                </a>
                            </div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

                    </div>

                </div>
    </section>

<?php else : ?>
    <p><?php __( 'No News' ); ?></p>
<?php endif; ?>