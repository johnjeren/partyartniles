<?php
/**
 * Plugin Name: Create Action Scheduler Tables
 * Description: Creates the missing Action Scheduler database tables
 * Version: 1.0
 * Author: Cascade
 */

// Run once on plugin load
add_action('plugins_loaded', function() {
    // Check if the table exists
    global $wpdb;
    $table_name = $wpdb->prefix . 'actionscheduler_actions';
    
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        // Table doesn't exist, try to create it
        if (class_exists('ActionScheduler_HybridStore')) {
            // Force Action Scheduler to create its schema
            if (class_exists('ActionScheduler_AdminView')) {
                // Make sure the store has been initialized
                ActionScheduler::store();
                
                // Create tables if they don't exist
                $store = ActionScheduler::store();
                if (method_exists($store, 'init_store')) {
                    $store->init_store();
                } elseif (method_exists($store, 'init')) {
                    $store->init();
                }
            }
        }
    }
}, 5); // Run after Action Scheduler initializes but before most plugins
