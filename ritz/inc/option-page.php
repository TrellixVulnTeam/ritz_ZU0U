<?php


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