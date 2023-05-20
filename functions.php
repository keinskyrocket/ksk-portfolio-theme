<?php
add_action( 'init', 'ksk_portfolio_theme_register_pattern_categories' );

function ksk_portfolio_theme_register_pattern_categories() {
    register_block_pattern_category( 'ksk-portfolio-theme', array( 
        'label' => __( 'KSK Portfolio Theme', 'ksk-portfolio-theme' )
    ) );
}

add_action( 'after_setup_theme', 'ksk_portfolio_theme_setup_patterns' );

function ksk_portfolio_theme_setup_patterns() {
    remove_theme_support( 'core-block-patterns' );
}

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'ksk-custom-category',
		'title' => 'KSK Custom'
	);

	return $categories;
} );

function addtional_styles() {
    wp_enqueue_style( 'css', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'addtional_styles' );

function twpp_change_excerpt_length( $length ) {
    $length = 16;
  
    return $length; 
}

add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );
