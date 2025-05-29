<?php
include_once('wp_bootstrap_navwalker.php');

// Suppress textdomain loading notices
add_filter('_doing_it_wrong_trigger_error', '__return_false');
add_filter('load_textdomain_early', '__return_false');
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


