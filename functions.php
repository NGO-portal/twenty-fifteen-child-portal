<?php

// Enque the scripts we need from mother-theme
add_action( 'wp_enqueue_scripts', 'be_theme_enqueue_styles' );
function be_theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array() );
}

//Usage: get_net_site_info($net_site_name, $net_site_desc);
function get_net_site_info(&$name, &$desc) {
	switch_to_blog(1);
		$name = get_bloginfo( 'name' );
		$desc = get_bloginfo( 'description' );
	restore_current_blog();
}

// Load child theme translation files
add_action( 'after_setup_theme', 'be_child_ngo_load_theme_textdomain' );
function be_child_ngo_load_theme_textdomain() {
  load_child_theme_textdomain( 'beyond-expectations', get_stylesheet_directory() . '/languages/parent-textdomain' );
  load_theme_textdomain( 'beyond-expectations-child-ngo', get_stylesheet_directory() . '/languages' );
}

?>
