<?php
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){

	register_sidebar( array(
		'name'          => __( 'Footer Col 1', 'ritz' ),
		'id'            => 'footer-col-1',
		'description'   => __( 'Footer column 1', 'ritz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Col 2', 'ritz' ),
		'id'            => 'footer-col-2',
		'description'   => __( 'Footer column 2', 'ritz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Col 3', 'ritz' ),
		'id'            => 'footer-col-3',
		'description'   => __( 'Footer column 3', 'ritz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Col 4', 'ritz' ),
		'id'            => 'footer-col-4',
		'description'   => __( 'Footer column 4', 'ritz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}