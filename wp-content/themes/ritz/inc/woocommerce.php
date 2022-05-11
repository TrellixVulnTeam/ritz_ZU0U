<?php
/**
 * WooCommerce Compatibility File
 *
 * @link    https://woocommerce.com/
 *
 * @package ritz
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function ritz_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ritz_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function ritz_woocommerce_scripts() {
	wp_enqueue_style( 'ritz-woocommerce-style',
		get_template_directory_uri() . '/woocommerce.css', array(),
		'1.2.6' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'ritz-woocommerce-style', $inline_font );
}

if ( class_exists( 'WooCommerce' ) ) {
	add_action( 'wp_enqueue_scripts', 'ritz_woocommerce_scripts' );
}

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function ritz_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}

add_filter( 'body_class', 'ritz_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 */
function ritz_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}

add_filter( 'woocommerce_output_related_products_args',
	'ritz_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content',
	'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content',
	'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'ritz_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function ritz_woocommerce_wrapper_before() {
		?>
        <main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content',
	'ritz_woocommerce_wrapper_before' );

if ( ! function_exists( 'ritz_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function ritz_woocommerce_wrapper_after() {
		?>
        </main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content',
	'ritz_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'ritz_woocommerce_header_cart' ) ) {
 * ritz_woocommerce_header_cart();
 * }
 * ?>
 */

if ( ! function_exists( 'ritz_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function ritz_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		ritz_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments',
	'ritz_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'ritz_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function ritz_woocommerce_cart_link() {
		?>
        <a class="cart-contents"
           href="<?php echo esc_url( wc_get_cart_url() ); ?>"
           title="<?php esc_attr_e( 'View your shopping cart', 'ritz' ); ?>">
			<?php
			$item_count_text = sprintf(
			/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items',
					WC()->cart->get_cart_contents_count(), 'ritz' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
            <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
            <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
        </a>
		<?php
	}
}

if ( ! function_exists( 'ritz_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function ritz_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr( $class ); ?>">
				<?php ritz_woocommerce_cart_link(); ?>
            </li>
            <li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
            </li>
        </ul>
		<?php
	}
}
/**
 *Creating custom product type
 */
add_filter( 'product_type_selector',
	'add_ritz_performance_touring_product_type' );

function add_ritz_performance_touring_product_type( $product_types ) {
	$product_types['ritz_performance_touring'] = 'Performance Touring';

	return $product_types;
}

add_action( 'init', 'create_ritz_performance_touring_product_class' );
add_filter( 'woocommerce_product_class',
	'load_ritz_performance_touring_product_class', 10, 2 );

function create_ritz_performance_touring_product_class() {
	class WC_Product_Ritz_Performance_Touring extends WC_Product {
		public function get_type() {
			return 'ritz_performance_touring'; // so you can use $product = wc_get_product(); $product->get_type()
		}
	}
}

function load_ritz_performance_touring_product_class(
	$php_classname, $product_type
) {
	if ( $product_type == 'ritz_performance_touring' ) {
		$php_classname = 'WC_Product_Ritz_Performance_Touring';
	}

	return $php_classname;
}

add_filter( 'woocommerce_product_data_tabs', 'product_data_tabs' );
function product_data_tabs( $tabs ) {

	$tabs['attribute']['class'][] = 'hide_if_ritz_performance_touring';

	return $tabs;

}

/**
 * Change number of related products output
 */
function woo_related_products_limit() {
	global $product;

	$args['posts_per_page'] = 6;

	return $args;
}

add_filter( 'woocommerce_output_related_products_args',
	'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products

	return $args;
}

/**
 * Add custom related products
 */
add_action( 'woocommerce_after_single_product_summary',
	'ritz_related_products',
	20 );
function ritz_related_products() {
//	get_template_part( 'template-parts/parts/banners/_part-banner-shop-favorites' );
}

/**
 * Remove product start
 */
remove_action( 'woocommerce_single_product_summary',
	'woocommerce_template_single_rating', 10 );


/**
 * Remove product tabs
 */
add_filter( 'woocommerce_product_tabs', 'my_remove_description_tab', 11 );

function my_remove_description_tab( $tabs ) {
	unset( $tabs['description'] );

	return $tabs;
}


/**
 * @ritz_breadcrumbs_container_TagBreadcrumbsClose
 */
add_action( 'woocommerce_before_main_content',
	'ritz_breadcrumbs_container_TagBreadcrumbsOpen',
	19 );
function ritz_breadcrumbs_container_TagBreadcrumbsOpen() {
	?><section class="section section__breadcrumbs pb-0">
    <div class="container">  <?php
}

/**
 * @ritz_breadcrumbs_container_TagBreadcrumbsClose
 */
add_action( 'woocommerce_before_main_content',
	'ritz_breadcrumbs_container_TagBreadcrumbsClose',
	21 );
function ritz_breadcrumbs_container_TagBreadcrumbsClose() {
	?></div></section><?php
}

/**
 * @ritz_product_container_TagProductOpen
 */
add_action( 'woocommerce_before_single_product',
	'ritz_product_container_TagProductOpen', 20 );
function ritz_product_container_TagProductOpen() {
	?>
    <section class="section section__product">
    <div class="container">
	<?php
}

/**
 * @ritz_product_container_TagProductClose
 */
add_action( 'woocommerce_after_single_product',
	'ritz_product_container_TagProductClose',
	21 );
function ritz_product_container_TagProductClose() {
	?>
    </div>
    </section><?php
}

add_action( 'woocommerce_single_product_summary',
	'ritz_product_ContainerOpen',
	3 );
function ritz_product_ContainerOpen() {
    echo '<div class="border-bottom mb-4 pb-4">';
}
add_action( 'woocommerce_share',
	'ritz_product_ContainerClose',
	3 );
function ritz_product_ContainerClose() {
    echo '</div>';
}

add_action( 'woocommerce_single_product_summary',
	'ritz_product_type',
	4 );
function ritz_product_type() {
	global $product;
	$product_type = get_field( 'product_type', $product->ID );

	echo( '<p class="product__type">' . $product_type . '</p>' );
}

add_action( 'woocommerce_single_product_summary', 'ritz_product_description',
	10 );
function ritz_product_description() {
	global $product;
	$product_description = get_the_content( $product->ID );
	echo '<p class="product__description">' . $product_description . '</p>';
}

/**
 *Hide SKU, Cats, Tags @ Single Product Page - WooCommerce
 */
remove_action( 'woocommerce_single_product_summary',
	'woocommerce_template_single_meta', 40 );

/**
 * Remove additional information
 */
add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 40 );

function bbloomer_remove_product_tabs( $tabs ) {
	unset( $tabs['additional_information'] );

	return $tabs;
}

/**
 * Add To Cart Icon
 */
add_filter( 'woocommerce_product_single_add_to_cart_text',
	'add_symbol_add_cart_button_single' );

function add_symbol_add_cart_button_single( $button ) {

	$icon_cart = get_stylesheet_directory()
	             . '/assets/userfiles/add-to-сart.svg';
	echo file_get_contents( $icon_cart );

	return $button;
}

/**
 * Product Featuerd Table
 */
add_action( 'woocommerce_share', 'product_featured_table', 21 );
function product_featured_table() {
	global $product;
	$featured = get_field( 'product_features', $product->ID );

	if ( $featured ):
		?>
        <h4><?= __( 'Features', 'ritz' ) ?></h4>
        <table class="table">
            <tbody>


			<?php
			// Loop through rows.
			foreach ( $featured as $feature ):
				$featured_title = $feature['features_title'];
				$featured_text = $feature['feature_display'];

				?>
                <tr class="border rounded">
                    <td><b><?= $featured_title ?></b></td>
                    <td><?= $featured_text ?></td>
                </tr>
			<?php
			endforeach;
			?>


            </tbody>
        </table>
	<?php

	endif;

}

/**
 * @ritz_related_TagProductOpen
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'relatedTagOpen', 11 );
function relatedTagOpen() {
	if ( is_product() ):
		echo '<div class="section__related-row-card-body card-body text-start">';
	endif;

}

/**
 * @ritz_related_TagProductClose
 */
add_action( 'woocommerce_after_shop_loop_item', 'relatedTagClose', 11 );
function relatedTagClose() {
	if ( is_product() ):
		echo '</div>';

	endif;

}

/**
 * Remove From Loop Add To Cart Button
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
/**
 * Change product title h2 to h4
 */

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	function woocommerce_template_loop_product_title() {
		echo '<h4 class="woocommerce-loop-product__title">' . get_the_title() . '</h4>';
	}
}

/**
 * @ritz_related_ProductType
 */
add_action( 'woocommerce_shop_loop_item_title', 'related_productType', 9 );
function related_productType() {

	if ( is_product() ):
		global $product;

		$product_type = get_field( 'product_type', $product->ID );
		echo '<small>' . $product_type . '</small>';

	endif;
}

/**
 * Product gallery
 */
add_filter( 'woocommerce_single_product_image_gallery_classes', function( $classes ) {
	$classes[] .= 'd-flex';

	return $classes;
} );
add_filter ( 'woocommerce_product_thumbnails_columns', 'bbloomer_change_gallery_columns' );

function bbloomer_change_gallery_columns() {
	return 1;
}
add_filter ( 'storefront_product_thumbnail_columns', 'bbloomer_change_gallery_columns_storefront' );

function bbloomer_change_gallery_columns_storefront() {
	return 1;
}


/**
 * Change Price Position
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_variation', 'misha_before_add_to_cart_btn' );
function misha_before_add_to_cart_btn(){
	global $product;

	$points= get_field('points',$product->id);

	echo '<div class="fw-bold d-flex justify-content-between my-3"><div class="price d-flex justify-content-end flex-row-reverse">'.$product->get_price_html().'</div> <div class="points"><span>'.$points.'</span></div> </div>';
}

function variation_radio_buttons($html, $args) {
	$args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
		'options'          => false,
		'attribute'        => false,
		'product'          => false,
		'selected'         => false,
		'name'             => '',
		'id'               => '',
		'class'            => '',
		'show_option_none' => __('Choose an option', 'woocommerce'),
	));

	if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
		$selected_key     = 'attribute_'.sanitize_title($args['attribute']);
		$args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']);
	}

	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
	$id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
	$class                 = $args['class'];
	$show_option_none      = (bool)$args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

	if(empty($options) && !empty($product) && !empty($attribute)) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[$attribute];
	}

	$radios = '<div class="variation-radios">';

	if(!empty($options)) {
		if($product && taxonomy_exists($attribute)) {
			$terms = wc_get_product_terms($product->get_id(), $attribute, array(
				'fields' => 'all',
			));

			foreach($terms as $term) {
				if(in_array($term->slug, $options, true)) {
					$id = $name.'-'.$term->slug;
					$radios .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($term->slug).'" '.checked(sanitize_title($args['selected']), $term->slug, false).'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $term->name)).'</label>';
				}
			}
		} else {
			foreach($options as $option) {
				$id = $name.'-'.$option;
				$checked    = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'], sanitize_title($option), false) : checked($args['selected'], $option, false);
				$radios    .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($option).'" id="'.sanitize_title($option).'" '.$checked.'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $option)).'</label>';
			}
		}
	}

	$radios .= '</div>';

	return $html.$radios;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'variation_radio_buttons', 20, 2);

function variation_check($active, $variation) {
	if(!$variation->is_in_stock() && !$variation->backorders_allowed()) {
		return false;
	}
	return $active;
}
add_filter('woocommerce_variation_is_active', 'variation_check', 10, 2);
