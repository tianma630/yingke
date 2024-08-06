<?php
/**
 * Theme functions and definitions
 *
 * @package Yingke
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function yingke_enqueue_scripts() {
    wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], '5.1.3', '' );
    
    wp_enqueue_script(
        'bootstrap-js',
        '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js',
        [ 'jquery' ],
        '5.1.3',
        true
    );

	wp_enqueue_style(
		'open-company-style',
		get_stylesheet_directory_uri() . '/yingke.css',
		[
			'bootstrap',
		],
		'1.0.0'
	);
    
    wp_enqueue_script(
        'yingke-main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [ 'jquery' ],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'yingke_enqueue_scripts', 20 );

// Hide Page Title
add_action( 'hello_elementor_page_title', function() {
  return false;
} );

function new_excerpt_more( $more ) {
	return '...'; // replace the normal [.....] with a empty string
}   
add_filter('excerpt_more', 'new_excerpt_more');


add_action('admin_head', 'widen_title_column');

function widen_title_column() {
  echo '<style>
    .posts #title {
      width: 300px;
    } 
  </style>';
}
