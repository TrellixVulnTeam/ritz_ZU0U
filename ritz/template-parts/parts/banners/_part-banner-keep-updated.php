<?php
// the query
$the_query = new WP_Query( array(
	'posts_per_page' => 3,
) );
?>

<?php if ( $the_query->have_posts() ) : ?>
    <section class="section section__keep-updated background__grey-f6">
        <div class="container">
            <div class="row section__favorites-row justify-content-between">
                <div class="col-auto">
                    <h4 class="fw-bold"><?= __( 'Keep Updated', 'ritz' ) ?></h4>
                </div>
                <div class="col-auto">
                    <a href="#" class="button btn"><?= __( 'See more',
							'ritz' ) ?></a>
                </div>
                <div class="section__favorites-row  row">
                    <div class="section__favorites-card-deck card-deck d-flex bg-transparent">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="section__favorites-card card border-0 rounded-0 col-4 col bg-transparent">
                                <a href="<?= get_permalink() ?>"
                                   target="_blank">
									<?php the_post_thumbnail( 'post-thumbnail',
										array(
											'class' => 'section__favorites-img card-img-top border-0 rounded-0',
											'alt'   => esc_html( get_the_title() )
										) );
									?>

                                    <div class="section__favorites-card-body card-body ">

                                        <p class="section__favorites-card-text card-text">
                                        <span
                                        ><?= get_the_category( get_the_ID() )[0]->name ?></span>
                                            <small><?= get_the_date( 'd M, Y' ); ?></small>
                                        </p>
                                        <h5 class="section__favorites-card-title card-title">                            <?php the_title(); ?></h5>

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