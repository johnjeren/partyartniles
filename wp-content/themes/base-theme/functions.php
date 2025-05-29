<?php
include_once('wp_bootstrap_navwalker.php');
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

add_action('init', function() {
    if (class_exists('ActionScheduler') && function_exists('as_unschedule_all_actions')) {
        ActionScheduler::init();
    }
}, 1);


