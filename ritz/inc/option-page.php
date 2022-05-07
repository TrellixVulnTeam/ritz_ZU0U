<?php
defined( 'ABSPATH' ) || exit;


function add_custom_option_page() {
	add_submenu_page(
		'edit.php', __( 'Count External Posts', 'ritz' ),
		__( 'Count External Posts', 'ritz' ), 'manage_options',
		'count-external-posts', 'ritz_ref_page_callback' );
}

add_action( 'admin_menu', 'add_custom_option_page' );

function ritz_ref_page_callback() {
	$url   = file_get_contents( "https://jsonplaceholder.typicode.com/posts" );
	$names = json_decode( $url );
// pass array into count() as parameter it will return array length
	?>
    <div class="wrap">
        <h1><?php _e( 'Count External Posts From API', 'ritz' ); ?></h1>
        <h2><b><?php _e( 'Count External Posts', 'ritz' );
				echo ' ';
				echo '<span style="color: red">' . count( $names ) . '</span>'
				?></b></h2>
    </div>
	<?php
}
function gt_get_post_view() {
	$count = get_post_meta( get_the_ID(), 'post_views_count', true );
	return "$count views";
}
function gt_set_post_view() {
	$key = 'post_views_count';
	$post_id = get_the_ID();
	$count = (int) get_post_meta( $post_id, $key, true );
	$count++;
	update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
	$columns['post_views'] = '<span class="dashicons dashicons-chart-bar" title="Views"><span class="screen-reader-text">Views</span></span>';
	return $columns;
}
function gt_posts_custom_column_views( $column ) {
	if ( $column === 'post_views') {
		echo gt_get_post_view();
	}
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );