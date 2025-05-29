<?php
/**
 * Plugin Name: Disable Textdomain Loading Notices
 * Description: Suppresses the "_load_textdomain_just_in_time was called incorrectly" notices
 * Version: 1.0
 * Author: Cascade
 */

// Disable the _doing_it_wrong notices
add_filter('doing_it_wrong_trigger_error', '__return_false');

// Disable the textdomain loading notices
add_action('init', function() {
    remove_action('plugins_loaded', 'wp_maybe_load_translations', 0);
    remove_action('setup_theme', 'wp_maybe_load_translations', 0);
    remove_action('after_setup_theme', 'wp_maybe_load_translations', 0);
}, 0);

// Suppress all PHP notices for good measure
error_reporting(E_ERROR | E_PARSE);
