<?php
// Load WordPress
require_once( dirname( __FILE__ ) . '/wp-load.php' );

// Force creation of Action Scheduler tables
echo "<h1>Action Scheduler Table Creation Script</h1>";

// Make sure Easy WP SMTP is active
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

if (!is_plugin_active('easy-wp-smtp/easy-wp-smtp.php')) {
    echo "<p>Easy WP SMTP plugin is not active. Please activate it first.</p>";
    exit;
}

// Check if tables exist
global $wpdb;
$as_tables = [
    $wpdb->prefix . 'actionscheduler_actions',
    $wpdb->prefix . 'actionscheduler_claims',
    $wpdb->prefix . 'actionscheduler_groups',
    $wpdb->prefix . 'actionscheduler_logs'
];

$missing_tables = [];
foreach ($as_tables as $table) {
    if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
        $missing_tables[] = $table;
    }
}

if (empty($missing_tables)) {
    echo "<p>All Action Scheduler tables already exist. No action needed.</p>";
} else {
    echo "<p>Missing tables: " . implode(', ', $missing_tables) . "</p>";
    
    // Try to create the tables using Action Scheduler's own methods
    echo "<p>Attempting to create missing tables...</p>";
    
    // Initialize Action Scheduler store
    if (class_exists('ActionScheduler')) {
        ActionScheduler::init(plugin_dir_path(WP_PLUGIN_DIR . '/easy-wp-smtp/easy-wp-smtp.php') . 'easy-wp-smtp.php');
        
        // Force a migration if needed
        if (class_exists('ActionScheduler_DataController')) {
            ActionScheduler_DataController::is_migration_complete();
        }
        
        // Get the store and attempt to initialize it
        $store = ActionScheduler::store();
        if (method_exists($store, 'init_store')) {
            $store->init_store();
            echo "<p>Store initialization complete.</p>";
        } else {
            echo "<p>Store initialization method not found.</p>";
        }
    } else {
        echo "<p>ActionScheduler class not found.</p>";
    }
    
    // Check if tables were created
    $still_missing = [];
    foreach ($missing_tables as $table) {
        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $still_missing[] = $table;
        }
    }
    
    if (empty($still_missing)) {
        echo "<p>Success! All tables have been created.</p>";
    } else {
        echo "<p>Some tables are still missing: " . implode(', ', $still_missing) . "</p>";
        echo "<p>Please try deactivating and reactivating the Easy WP SMTP plugin.</p>";
    }
}

echo "<p><a href='" . admin_url() . "'>Return to WordPress Admin</a></p>";
