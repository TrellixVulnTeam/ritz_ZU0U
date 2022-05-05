<?php
defined( 'ABSPATH' ) || exit;
/**
 * @ritz_footer_TagFooterOpen
*/
add_action( 'footer_parts', 'ritz_footer_TagFooterOpen', 20 );
function ritz_footer_TagFooterOpen() {
	?>
  	<!-- FOOTER -->
  	<footer class="footer">
	<?php
};
/**
 * @ritz_footer_TagFooterInner
*/
add_action( 'footer_parts', 'ritz_footer_TagFooterInner', 30 );
function ritz_footer_TagFooterInner() {
	?>

    <!-- container -->
    <div class="container">

        <!-- top row -->
        <div class="footer__toprow">

            <!-- top row > left -->
            <div class="footer__toprow-left">

                <!-- text -->
                <div class="footer__text">
                    <?= get_field( 'text', 'theme_settings' ) ?>
                </div>
                <!-- end text -->

                <!-- btngroup -->
                <div class="footer__btngroup">

                    <a href="<?= home_url( 'about-us/contact-us' ) ?>" class="btn btn-opacity btn-lg btn-color-white">
                        <span><?= __( 'Contact US', 'ritz' ) ?></span>
                    </a>

                    <a href="<?php echo get_field('button_candidate_url', get_option('page_on_front')); ?>" class="btn btn-lg btn-color-white">
                        <span><?php echo get_field('button_candidate_text', get_option('page_on_front')); ?></span>
                    </a>

                </div>
                <!-- end btngroup -->

            </div>
            <!-- end top row > left -->

            <!-- top row > right -->
            <div class="footer__toprow-right">
                <?php
                $list = get_field( 'list', 'theme_settings' );
                ?>

                <?php if( $list ) : ?>
                <!-- nav -->
                <ul class="footer__list">

                    <?php foreach ( $list as $item ) : ?>
                        <li>
                            <a href="<?= $item['link']['url'] ?>">
                                <?= $item['link']['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
                <!-- end nav -->
                <?php endif; ?>

            </div>
            <!-- end top row > right -->

        </div>
        <!-- end top row -->

        <!-- bottom row -->
        <div class="footer__botrow">

            <!-- bottom row > left -->
            <div class="footer__botrow-left">

                <!-- logo list -->
                <div class="footer__logolist">

                    <?php
                    $logos = get_field( 'logos', 'theme_settings' )
                    ?>

                    <?php if( $logos['list'] ) : ?>

                    <!-- title -->
                    <h5 class="footer__logolist-title">
                        <?= $logos['title'] ?>
                    </h5>
                    <!-- end title -->

                    <!-- list -->
                    <ul class="footer__logolist-list">

                        <?php foreach ( $logos['list'] as $item ) : ?>
                        <li>
                            <img
                                    src="<?= $item['logo'] ?>"
                                    alt="<?= $item['title'] ?>"
                                    title="<?= $item['title'] ?>"
                            >
                        </li>
                        <?php endforeach; ?>

                    </ul>
                    <!-- end list -->

                    <?php endif; ?>

                </div>
                <!-- end logo list -->

            </div>
            <!-- end bottom row > left -->

            <!-- bottom row > right -->
            <div class="footer__botrow-right">

                <!-- vertical center -->
                <div>

                    <?php
                    $socials = get_field( 'socials', 'theme_settings' )
                    ?>

                    <?php if( $socials ) : ?>
                    <!-- socials -->
                    <ul class="footer__socials">

                        <?php foreach ( $socials as $item ) : ?>
                        <li>
                            <a href="<?= $item['link'] ?>" class="<?= $item['title'] ?>" target="_blank">
                                <?= $item['icon'] ?>
                            </a>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                    <!-- end socials -->
                    <?php endif; ?>

                    <!-- copyright -->
                    <div class="footer__copyright">
                        <?= get_field( 'copyright', 'theme_settings' ) ?>
                    </div>
                    <!-- end copyright -->

                </div>
                <!-- end vertical center -->

            </div>
            <!-- end bottom row > right -->

        </div>
        <!-- end bottom row -->

        <!-- bottom -->
        <div class="footer__bottom">

            <?= get_field( 'bottom_text', 'theme_settings' ) ?>

        </div>
        <!-- end bottom -->

    </div>
    <!-- end container -->

	<?php
};
/**
 * @ritz_footer_TagFooterClose
*/
add_action( 'footer_parts', 'ritz_footer_TagFooterClose', 100 );
function ritz_footer_TagFooterClose() {
	?>
  	</footer>
  	<!-- END FOOTER -->
	<?php
};
